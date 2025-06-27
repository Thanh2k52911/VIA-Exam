<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <style>
        body {
            font-family: Arial;
            padding: 20px;
            background-color: #f4f4f4;
        }
        form {
            background: white;
            padding: 30px;
            max-width: 500px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        input {
            display: block;
            width: 100%;
            margin-bottom: 15px;
            padding: 8px;
        }
        label {
            font-weight: bold;
        }
        button {
            padding: 10px 20px;
            background: green;
            border: none;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        .register-link {
            margin-top: 10px;
            display: block;
        }
    </style>
</head>
<body>
    <h2>Đăng nhập</h2>

    @if(session('error'))
        <div style="color: red;">{{ session('error') }}</div>
    @endif

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <form action="{{ route('handle.login') }}" method="POST">
        @csrf
        <label>Email hoặc số điện thoại</label>
        <input type="text" name="login" required>

        <label>Mật khẩu</label>
        <input type="password" name="password" required>

        <button type="submit">Đăng nhập</button>
    </form>

    <p>
        Quên mật khẩu? <a href="{{ route('forgot-password') }}">Lấy lại mật khẩu</a>
    </p>

    <p class="register-link">
        Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký</a>
    </p>
</body>
</html>
