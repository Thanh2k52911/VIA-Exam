<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quên mật khẩu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        form {
            background: white;
            padding: 30px;
            max-width: 500px;
            width: 100%;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
            text-align: center;
        }
        h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
            text-align: left;
        }
        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            font-size: 14px;
            color: #666;
        }
        input {
            display: block;
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        .info-text {
            text-align: left;
            color: #666;
            font-size: 12px;
            margin-bottom: 20px;
        }
        button {
            padding: 10px 20px;
            background: #f4a261;
            border: none;
            color: white;
            font-weight: bold;
            cursor: pointer;
            border-radius: 20px;
            width: auto;
            display: inline-block;
        }
        button:hover {
            background: #e07a5f;
        }
    </style>
</head>
<body>
    <form action="{{ route('handle.sendOtp') }}" method="POST">
        @csrf
        <h2>YÊU CẦU THAY ĐỔI MẬT KHẨU</h2>

        @if(session('success'))
            <div style="color: green; text-align: left; margin-bottom: 15px;">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div style="color: red; text-align: left; margin-bottom: 15px;">{{ session('error') }}</div>
        @endif

        <label>Email/ Số điện thoại</label>
        <input type="text" name="login" required>
        <div class="info-text">Bạn vui lòng kiểm tra hộp thư điện thoại hoặc số điện thoại để lấy mã OTP</div>

        <button type="submit">Gửi yêu cầu</button>
    </form>
</body>
</html>
