<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Route Trang Chủ
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    $storeName = session('store_name'); // Lấy từ session
    return view('welcome', compact('storeName'));
})->name('home');

/*
|--------------------------------------------------------------------------
| Route Đăng Ký
|--------------------------------------------------------------------------
*/
Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [AuthController::class, 'register'])->name('handle.register');

/*
|--------------------------------------------------------------------------
| Route Đăng Nhập
|--------------------------------------------------------------------------
*/
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('handle.login');

/*
|--------------------------------------------------------------------------
| Route Quên Mật Khẩu và OTP
|--------------------------------------------------------------------------
*/
Route::get('/forgot-password', function () {
    return view('forgot_password');
})->name('forgot-password');

Route::post('/forgot-password', [AuthController::class, 'sendOtp'])->name('handle.sendOtp');

Route::post('/resend-otp', [AuthController::class, 'resendOtp'])->name('resend-otp');

Route::get('/verify-otp', function () {
    if (!session('otp_user_id')) {
        return redirect()->route('forgot-password');
    }
    return view('verify_otp');
})->name('verify-otp');

Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('handle.verifyOtp');

/*
|--------------------------------------------------------------------------
| Route Đặt Lại Mật Khẩu
|--------------------------------------------------------------------------
*/
Route::get('/reset-password', function () {
    if (!session('otp_verified')) {
        return redirect()->route('forgot-password');
    }
    return view('reset_password');
})->name('reset-password');

Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('handle.resetPassword');
