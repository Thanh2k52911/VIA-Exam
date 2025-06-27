<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thiết lập mật khẩu mới</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            max-width: 500px;
            width: 100%;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        h2 {
            margin: 0;
            color: #333;
            font-size: 24px;
        }
        .message {
            text-align: center;
            margin-bottom: 10px;
        }
        .message.error {
            color: red;
        }
        .message.success {
            color: green;
        }
        form {
            background: white;
            width: 100%;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
            text-align: center;
        }
        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            font-size: 16px;
            color: #333;
        }
        .password-container {
            position: relative;
            margin-bottom: 15px;
        }
        input[type="password"],
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
            color: #333;
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 16px;
            color: #666;
        }
        button {
            background: #f4a261;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        button:hover {
            background: #e07a5f;
        }
        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
            display: none;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Thiết lập mật khẩu mới</h2>
            @if(session('error'))
                <div class="message error">{{ session('error') }}</div>
            @endif
            @if(session('success'))
                <div class="message success">{{ session('success') }}</div>
            @endif
        </div>
        <form action="{{ route('handle.resetPassword') }}" method="POST">
            @csrf
            <label>Mật khẩu mới</label>
            <div class="password-container">
                <input type="password" name="new_password" id="new-password" required>
                <span class="toggle-password" onclick="togglePassword('new-password')">👁️</span>
            </div>
            <div class="error-message" id="password-error"></div>

            <label>Xác nhận mật khẩu mới</label>
            <div class="password-container">
                <input type="password" name="confirm_password" id="confirm-password" required>
                <span class="toggle-password" onclick="togglePassword('confirm-password')">👁️</span>
            </div>
            <div class="error-message" id="confirm-password-error"></div>

            <input type="hidden" name="user_id" value="{{ session('otp_user_id') }}">

            <button type="submit">Đăng nhập</button>
        </form>
    </div>

    <script>
        function togglePassword(fieldId) {
            const passwordField = document.getElementById(fieldId);
            const toggleIcon = passwordField.nextElementSibling;
            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleIcon.textContent = "👁️‍🗨️";
            } else {
                passwordField.type = "password";
                toggleIcon.textContent = "👁️";
            }
        }

        const passwordInput = document.getElementById('new-password');
        const confirmPasswordInput = document.getElementById('confirm-password');
        const passwordError = document.getElementById('password-error');
        const confirmPasswordError = document.getElementById('confirm-password-error');

        passwordInput.addEventListener('input', () => {
            const password = passwordInput.value;
            const minLength = password.length >= 9;
            const hasLowercase = /[a-z]/.test(password);
            const hasUppercase = /[A-Z]/.test(password);
            const hasNumber = /[0-9]/.test(password);
            const hasSpecialChar = /[\W]/.test(password);

            if (!minLength || !hasLowercase || !hasUppercase || !hasNumber || !hasSpecialChar) {
                passwordError.style.display = 'block';
                passwordError.textContent = 'Mật khẩu phải có ít nhất 9 ký tự, bao gồm chữ thường, chữ hoa, số và ký tự đặc biệt.';
            } else {
                passwordError.style.display = 'none';
                passwordError.textContent = '';
            }
        });

        confirmPasswordInput.addEventListener('input', () => {
            const password = passwordInput.value;
            const confirmPassword = confirmPasswordInput.value;

            if (password !== confirmPassword && confirmPassword !== '') {
                confirmPasswordError.style.display = 'block';
                confirmPasswordError.textContent = 'Mật khẩu xác nhận không khớp.';
            } else {
                confirmPasswordError.style.display = 'none';
                confirmPasswordError.textContent = '';
            }
        });
    </script>
</body>
</html>
