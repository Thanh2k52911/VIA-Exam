<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\OtpRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'store_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required|regex:/^0[35789][0-9]{8}$/|unique:users',
            'password' => 'required|min:9|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[\W]/',
            'ward' => 'nullable|string',
            'district' => 'nullable|string',
            'city' => 'nullable|string',
            'agreed_policy' => 'accepted'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'store_name' => $request->store_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password_hash' => Hash::make($request->password),
            'ward' => $request->ward,
            'district' => $request->district,
            'city' => $request->city,
            'agreed_policy' => true
        ]);

        return redirect()->back()->with('success', 'Đăng ký thành công!');
    }


public function login(Request $request)
{
    $validator = Validator::make($request->all(), [
        'login' => 'required',
        'password' => 'required'
    ]);

    if ($validator->fails()) {
        return redirect()->back()->with('error', 'Vui lòng nhập đầy đủ email/số điện thoại và mật khẩu')->withInput();
    }

    $login = $request->input('login');
    $password = $request->input('password');

    $user = User::where('email', $login)->orWhere('phone', $login)->first();

    if (!$user || !Hash::check($password, $user->password_hash)) {
        return redirect()->back()->with('error', 'Email/số điện thoại hoặc mật khẩu không chính xác')->withInput();
    }

    Auth::login($user);


    Session::put('store_name', $user->store_name);

    return redirect('/');
}




   public function sendOtp(Request $request)
{
    $login = trim($request->input('login'));
    $user = User::where('email', $login)->orWhere('phone', $login)->first();

    if (!$user) {
        return redirect()->back()->with('error', 'Người dùng không tồn tại');
    }


    $lastOtp = OtpRequest::where('user_id', $user->id)
        ->where('created_at', '>=', Carbon::now()->subSeconds(60))
        ->latest()
        ->first();

    if ($lastOtp) {
        return redirect()->back()->with('error', 'Vui lòng đợi 60 giây trước khi yêu cầu mã OTP mới');
    }

    $otp = rand(100000, 999999);
    $expiresAt = Carbon::now()->addMinutes(3);

    OtpRequest::create([
        'user_id' => $user->id,
        'otp_code' => $otp,
        'expires_at' => $expiresAt,
        'is_used' => false
    ]);


    if ($user->email) {
        Mail::raw("Xin chào {$user->store_name},\n\nMã OTP của bạn là: {$otp}\nThời hạn: 3 phút\n\nĐừng chia sẻ mã này với bất kỳ ai.", function ($message) use ($user) {
            $message->to($user->email)->subject('Mã OTP xác nhận đổi mật khẩu');
        });
    }


    Session::put('otp_user_id', $user->id);
    Session::put('latest_otp', $otp);

    return redirect()->back()
    ->with('success', 'Mã OTP đã được gửi tới email của bạn')
    ->with('step', 'verify'); // Truyền thêm trạng thái bước

}



    public function resendOtp(Request $request)
{
    $user_id = Session::get('otp_user_id');

    if (!$user_id) {
        return response()->json(['error' => 'Phiên làm việc không hợp lệ'], 400);
    }

    $user = User::find($user_id);

    if (!$user) {
        return response()->json(['error' => 'Người dùng không tồn tại'], 404);
    }

    $lastOtp = OtpRequest::where('user_id', $user->id)
        ->where('created_at', '>=', Carbon::now()->subSeconds(60))
        ->latest()
        ->first();

    if ($lastOtp) {
        return response()->json(['error' => 'Vui lòng đợi 60 giây trước khi yêu cầu mã OTP mới'], 429);
    }

    $otp = rand(100000, 999999);
    $expiresAt = Carbon::now()->addMinutes(3);

    OtpRequest::create([
        'user_id' => $user->id,
        'otp_code' => $otp,
        'expires_at' => $expiresAt,
        'is_used' => false
    ]);


    if ($user->email) {
        Mail::raw("Xin chào {$user->store_name},\n\nMã OTP mới của bạn là: {$otp}\nThời hạn: 3 phút\n\nĐừng chia sẻ mã này với bất kỳ ai.", function ($message) use ($user) {
            $message->to($user->email)->subject('Mã OTP mới - Đổi mật khẩu');
        });
    }

    Session::put('latest_otp', $otp);

    return response()->json(['success' => true, 'message' => 'Mã OTP mới đã được gửi']);
}



    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'otp' => 'required|array|size:6',
            'user_id' => 'required|exists:users,id'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $otpArray = $request->input('otp');
        $user_id = $request->input('user_id');
        $otpCode = implode('', $otpArray);

        $otpRecord = OtpRequest::where('user_id', $user_id)
            ->where('otp_code', $otpCode)
            ->where('is_used', false)
            ->where('expires_at', '>', now())
            ->latest()
            ->first();

        if (!$otpRecord) {
            return redirect()->back()->with('error', 'Mã OTP không hợp lệ hoặc đã hết hạn');
        }


        $otpRecord->update(['is_used' => true]);


        Session::put('otp_verified', true);
        Session::put('otp_user_id', $user_id);

        return redirect()->back()
    ->with('success', 'OTP hợp lệ, hãy nhập mật khẩu mới')
    ->with('step', 'reset');

    }


    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'new_password' => 'required|min:9|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[\W]/',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user_id = $request->user_id;
        $session_user_id = Session::get('otp_user_id');


        if (!$session_user_id || $session_user_id != $user_id || !Session::get('otp_verified')) {
            return redirect()->route('forgot-password')->with('error', 'Phiên làm việc không hợp lệ');
        }

        $user = User::find($user_id);
        $user->password_hash = Hash::make($request->new_password);
        $user->save();


        Session::forget(['otp_user_id', 'otp_verified', 'latest_otp']);

        return redirect('/')->with('success', 'Mật khẩu đã được thay đổi thành công!');
    }
}
