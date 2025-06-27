<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký tài khoản</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #fff;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .header {
            background-image: url('{{ asset("images/via-character.png") }}');
            background-size: cover;
            background-position: center;
            height: 300px;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 20px;
            width: 100%;
            min-width: 1200px;
        }

        .header .login-section {
            background: white;
            padding: 15px;
            border-radius: 5px;
            width: 70%;
            max-width: 600px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            color: #333;
            height: auto;
            position: relative;
        }

        .header .login-title {
            position: absolute;
            top: 50px;
            right: 20px;
            width: 70%;
            max-width: 600px;
            color: white;
            font-size: 24px;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
            text-align: left;
        }

        .header .forgot-password {
            position: absolute;
            bottom: -30px;
            right: 0;
            font-size: 12px;
            color: #ffbc80;
            text-decoration: none;
            width: 100%;
            text-align: right;
        }

        .header .forgot-password:hover {
            text-decoration: underline;
        }

        .header .login-section .form-group {
            display: flex;
            gap: 10px;
            align-items: flex-end;
            min-height: 60px;
        }

        .header .login-section input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            color: #333;
            width: 100%;
            height: 40px;
        }

        .header .login-section .password-toggle {
            flex: 1;
            position: relative;
        }

        .header .login-section .password-toggle input {
            padding-right: 40px;
        }

        .header .login-section .toggle-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 14px;
            color: #000;
        }

        .header .login-section button {
            flex: 0 0 120px;
            padding: 12px;
            background: #f4a261;
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            height: 40px;
            margin: 0;
        }

        .header .login-section button:hover {
            background: #e76f51;
        }

        .header .login-section .message {
            margin-bottom: 8px;
            font-size: 12px;
            text-align: center;
        }

        .header .login-section .message.error {
            color: red;
        }

        .header .login-section .message.success {
            color: green;
        }

        .header .wave {
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 100%;
            height: 50px;
            background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxNDQwIDMyMCI+PHBhdGggZmlsbD0iI2ZmZiIgZD0iTTE0NDAgMzJIMHctMTQ0MEw3MjAgM3oiLz48L3N2Zz4=') repeat-x;
            background-size: contain;
        }

        .main-content {
            display: flex;
            flex: 1;
            padding: 20px;
            justify-content: space-between;
            align-items: stretch;
            width: 100%;
            max-width: none;
        }

        .register-form {
            flex: 1;
            max-width: 50%;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .register-form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #f4a261;
            font-size: 24px;
        }

        .register-form label {
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
            display: block;
        }

        .register-form input, .register-form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            height: 40px;
        }

        .register-form input:focus, .register-form select:focus {
            outline: none;
            border-color: #e76f51;
            box-shadow: 0 0 5px rgba(231, 111, 81, 0.5);
        }

        .register-form .checkbox-label {
            font-weight: normal;
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .register-form .checkbox-label input {
            margin-right: 10px;
            width: auto;
        }

        .register-form .checkbox-label a {
            color: #e76f51;
            text-decoration: none;
        }

        .register-form .checkbox-label a:hover {
            text-decoration: underline;
        }

        .register-form button {
            width: 100%;
            padding: 12px;
            background: #f4a261;
            border: none;
            color: white;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }

        .register-form button:hover {
            background: #e76f51;
        }

        .message {
            text-align: center;
            margin-bottom: 15px;
            padding: 10px;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }

        .services {
            flex: 1;
            max-width: 50%;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .services h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            font-size: 28px;
        }

        .services .service-grid {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .services .service-row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        .services .service-item {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-sizing: border-box;
            text-align: center;
            font-size: 20px;
        }

        .services .service-item img {
            width: 50px;
            margin-right: 10px;
        }

        .services .service-item a {
            color: #000000;
            text-decoration: none;
            font-weight: bold;
        }

        .services .service-item a:hover {
            text-decoration: underline;
        }

        .services .service-center {
            display: flex;
            justify-content: center;
        }

        .footer {
            background: #d4a017;
            padding: 20px;
            text-align: center;
            color: white;
            margin-top: auto;
        }

        .footer .contact {
            font-size: 14px;
        }

        .footer .contact a {
            color: white;
            text-decoration: none;
        }

        .footer .contact a:hover {
            text-decoration: underline;
        }

        .footer .qrcode {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
        }

        .footer .qrcode img {
            max-height: 80px;
        }

        .brand-icons-section {
            padding: 20px;
            text-align: center;
        }

        .brand-icons-section h3 {
            margin-bottom: 20px;
            color: #333;
            font-size: 28px;
        }

        .brand-icons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            flex-wrap: wrap;
            gap: 30px;
        }

        .brand-icon {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 24px;
            font-weight: bold;
        }

        .brand-icon i {
            font-size: 30px;
        }

        .brand-icon.tiktok { color: #000; }
        .brand-icon.shopee { color: #ee4d2d; }
        .brand-icon.oppo { color: #00a884; }
        .brand-icon.tiki { color: #189eff; }
        .brand-icon.tgdd { color: #fdd835; }
        .brand-icon.tgdd i { border: 2px solid #fdd835; border-radius: 50%; padding: 8px; }
        .brand-icon.upos { color: #006c8c; }

        .success-notification {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            z-index: 1000;
            display: none;
            flex-direction: column;
            align-items: center;
            width: 400px;
        }

        .success-notification.show {
            display: flex;
            animation: slideUpFadeIn 0.5s ease-out forwards;
        }

        .success-notification .check-icon {
            font-size: 60px;
            color: #28a745;
            margin-bottom: 10px;
            background: #e6ffe6;
            border-radius: 50%;
            padding: 15px;
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .success-notification h3 {
            margin: 0 0 10px;
            color: #28a745;
            font-size: 28px;
            font-weight: bold;
        }

        .success-notification p {
            margin: 0 0 20px;
            color: #333;
            font-size: 16px;
            line-height: 1.5;
        }

        .success-notification .buttons {
            display: flex;
            gap: 15px;
        }

        .success-notification button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
            width: 120px;
        }

        .success-notification .login-btn {
            background: #e0e0e0;
            color: #333;
        }

        .success-notification .login-btn:hover {
            background: #c0c0c0;
        }

        .success-notification .cooperate-btn {
            background: #28a745;
            color: white;
        }

        .success-notification .cooperate-btn:hover {
            background: #218838;
        }

        @keyframes slideUpFadeIn {
            from { opacity: 0; }
            to { opacity: 1; transform: translate(-50%, -50%); }
        }

        .success-notification .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
            color: #666;
        }

        .success-notification .close-btn:hover {
            color: #000;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1001;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
            position: relative;
            border: 2px solid #f4a261;
            margin: 0 auto;
            top: 50%;
            transform: translateY(-50%);
        }

        #reset-password-modal .modal-content {
            width: 400px;
            padding: 20px;
        }

        #reset-password-modal .header {
            display: none;
        }

        #reset-password-modal h2 {
            margin: 0 0 20px;
        }

        #reset-password-modal .password-container {
            position: relative;
            margin-bottom: 15px;
        }

        #reset-password-modal .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 18px;
        }

        #reset-password-modal .error-message {
            color: red;
            font-size: 12px;
            text-align: left;
            margin-bottom: 10px;
            display: none;
        }

        #reset-password-modal button[type="submit"] {
            margin-top: 10px;
        }

        .modal h2 {
            margin-bottom: 20px;
            color: #f4a261;
            font-size: 24px;
            font-weight: bold;
        }

        .modal label {
            font-weight: bold;
            color: #333;
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }

        .modal input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            box-sizing: border-box;
            height: 50px;
            background: #f9f9f9;
        }

        .modal input:focus {
            outline: none;
            border-color: #e76f51;
            box-shadow: 0 0 5px rgba(231, 111, 81, 0.5);
        }

        .modal .info-text {
            font-size: 12px;
            color: #666;
            margin-bottom: 15px;
            text-align: left;
        }

        .modal button {
            width: 100%;
            padding: 12px;
            background: #f4a261;
            border: none;
            color: #fff;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }

        .modal button:hover {
            background: #e76f51;
        }

        .modal .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 24px;
            cursor: pointer;
            color: #666;
            background: none;
            border: none;
        }

        .modal .close-btn:hover {
            color: #e76f51;
        }

        .otp-group {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .otp-group input {
            width: 40px;
            height: 50px;
            text-align: center;
            font-size: 18px;
            border-radius: 8px;
            border: 1px solid #ccc;
            background: #f9f9f9;
        }

        .otp-group input:focus {
            border-color: #e76f51;
            box-shadow: 0 0 5px rgba(231, 111, 81, 0.5);
        }

        .button-group {
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .button-group .back-btn {
            padding: 12px;
            background: #e0e0e0;
            color: #333;
            border-radius: 8px;
            text-decoration: none;
            flex: 1;
            text-align: center;
            font-weight: bold;
        }

        .button-group .back-btn:hover {
            background: #c0c0c0;
        }

        .button-group .submit-btn {
            padding: 12px;
            background: #f4a261;
            color: #fff;
            border-radius: 8px;
            border: none;
            flex: 1;
            text-align: center;
            font-weight: bold;
        }

        .button-group .submit-btn:hover {
            background: #e76f51;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successNotification = document.getElementById('successNotification');
            const loginBtn = document.querySelector('.login-btn');
            const closeBtn = document.querySelector('.success-notification .close-btn');
            const cooperateBtn = document.querySelector('.cooperate-btn');


            @if (session('success') && request()->routeIs('handle.register'))
                successNotification.classList.add('show');

                setTimeout(() => {
                    successNotification.classList.remove('show');
                }, 5000);
            @endif


            if (closeBtn) {
                closeBtn.addEventListener('click', function() {
                    successNotification.classList.remove('show');
                });
            }


            if (loginBtn) {
                loginBtn.addEventListener('click', function() {
                    window.location.href = '{{ route('login') }}';
                });
            }


            if (cooperateBtn) {
                cooperateBtn.addEventListener('click', function() {
                    alert('Chức năng hợp tác đang được phát triển!');
                });
            }


            function showForgotPassword() {
                document.getElementById('forgot-password-modal').style.display = 'block';
                document.getElementById('verify-otp-modal').style.display = 'none';
                document.getElementById('reset-password-modal').style.display = 'none';
                successNotification.classList.remove('show');
            }

            function showVerifyOtp() {
                document.getElementById('forgot-password-modal').style.display = 'none';
                document.getElementById('verify-otp-modal').style.display = 'block';
                document.getElementById('reset-password-modal').style.display = 'none';
                successNotification.classList.remove('show');
                startTimer();
            }

            function showResetPassword() {
                document.getElementById('forgot-password-modal').style.display = 'none';
                document.getElementById('verify-otp-modal').style.display = 'none';
                document.getElementById('reset-password-modal').style.display = 'block';
                successNotification.classList.remove('show');
            }


            const step = "{{ session('step') }}";
            if (step === "verify") showVerifyOtp();
            if (step === "reset") showResetPassword();


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

            if (passwordInput) {
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
            }

            if (confirmPasswordInput) {
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
            }


            let timeLeft = 180;
            let countdownInterval;
            const timerElement = document.getElementById('timer');
            const resendBtn = document.getElementById('resend-btn');
            const inputs = document.querySelectorAll('input[name="otp[]"]');

            function startTimer() {
                clearInterval(countdownInterval);
                timeLeft = 180;
                updateTimer();
                countdownInterval = setInterval(updateTimer, 1000);
            }

            function updateTimer() {
                const minutes = Math.floor(timeLeft / 60);
                const seconds = timeLeft % 60;
                timerElement.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
                if (timeLeft <= 0) {
                    clearInterval(countdownInterval);
                    timerElement.textContent = '00:00';
                    resendBtn.disabled = false;
                } else {
                    timeLeft--;
                    resendBtn.disabled = true;
                }
            }

            if (resendBtn) {
                resendBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    if (resendBtn.disabled) return;
                    resendBtn.disabled = true;
                    resendBtn.textContent = 'Đang gửi...';
                    fetch('{{ route("resend-otp") }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        credentials: 'same-origin'
                    })
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(err => { throw new Error(err.error || `Lỗi ${response.status}`); });
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            alert(data.message || 'Mã OTP đã được gửi lại!');
                            startTimer();
                            inputs.forEach(input => {
                                input.value = '';
                                input.classList.remove('filled');
                            });
                            inputs[0].focus();
                        } else {
                            alert(data.error || 'Gửi lại mã thất bại, vui lòng thử lại.');
                        }
                    })
                    .catch(error => {
                        console.error('Lỗi:', error);
                        let errorMessage = 'Đã có lỗi xảy ra, vui lòng thử lại.';
                        if (error.message.includes('419')) {
                            errorMessage = 'Phiên làm việc hết hạn. Vui lòng tải lại trang.';
                        } else if (error.message.includes('429')) {
                            errorMessage = 'Vui lòng đợi 60 giây trước khi yêu cầu mã mới.';
                        }
                        alert(errorMessage);
                    })
                    .finally(() => {
                        resendBtn.disabled = timeLeft > 0;
                        resendBtn.textContent = 'Gửi lại mã';
                    });
                });
            }

            inputs.forEach((input, i) => {
                input.addEventListener('input', () => {
                    if (input.value.length > 0 && i < inputs.length - 1) inputs[i + 1].focus();
                    if (input.value) input.classList.add('filled');
                    else input.classList.remove('filled');
                });
            });


            const forgotPasswordLink = document.querySelector('.forgot-password');
            if (forgotPasswordLink) {
                forgotPasswordLink.addEventListener('click', showForgotPassword);
            }
        });
    </script>
</head>
<body>
    <div class="header">
        <h4 class="login-title">ĐĂNG NHẬP NGAY</h4>
        <div class="login-section">
            @if(session('error'))
                <div class="message error">{{ session('error') }}</div>
            @endif
            @if(session('success') && request()->routeIs('handle.login'))
                <div class="message success">{{ session('success') }}</div>
            @endif
            <form action="{{ route('handle.login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <div style="flex: 1;">
                        <label style="font-weight: bold; color: #333; margin-bottom: 5px; display: block;">
                            Số điện thoại hoặc Email
                        </label>
                        <input type="text" name="login" placeholder="Nhập số điện thoại hoặc email..."
                               style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;
                                      font-size: 14px; box-sizing: border-box; height: 40px;" required>
                    </div>
                    <div class="password-toggle" style="flex: 1; position: relative;">
                        <label style="font-weight: bold; color: #333; margin-bottom: 5px; display: block;">
                            Mật khẩu
                        </label>
                        <input type="password" name="password" placeholder="Nhập mật khẩu..."
                               style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;
                                      font-size: 14px; box-sizing: border-box; height: 40px; padding-right: 40px;" required>
                        <span class="toggle-icon"
                              onclick="this.previousElementSibling.type = this.previousElementSibling.type === 'password' ? 'text' : 'password';"
                              style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%);
                                     cursor: pointer; font-size: 14px; color: #000;">👁</span>
                    </div>
                    <div style="flex: 0 0 120px;">
                        <button type="submit"
                                style="width: 100%; padding: 12px; background: #f4a261; border: none; color: white;
                                       font-weight: bold; border-radius: 5px; cursor: pointer; font-size: 16px;
                                       height: 40px; margin: 0;">
                            Đăng nhập
                        </button>
                    </div>
                </div>
            </form>
            <a href="javascript:void(0);" class="forgot-password"
               style="display: inline-block; margin-top: 10px; color: #f4a261; cursor: pointer;">
                Quên mật khẩu?
            </a>
        </div>
        <div class="wave"></div>
    </div>

    <div id="forgot-password-modal" class="modal">
        <div class="modal-content">
            <form action="{{ route('handle.sendOtp') }}" method="POST">
                @csrf
                <span class="close-btn" onclick="this.parentElement.parentElement.style.display='none'">×</span>
                <h2>YÊU CẦU THAY ĐỔI MẬT KHẨU</h2>
                @if(session('success') && request()->routeIs('handle.sendOtp'))
                    <div style="color: green;">{{ session('success') }}</div>
                @endif
                @if(session('error') && request()->routeIs('handle.sendOtp'))
                    <div style="color: red;">{{ session('error') }}</div>
                @endif
                <label>Email/ Số điện thoại</label>
                <input type="text" name="login" required>
                <div class="info-text">Kiểm tra email hoặc điện thoại để lấy mã OTP</div>
                <button type="submit">Gửi yêu cầu</button>
            </form>
        </div>
    </div>

    <div id="verify-otp-modal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="this.parentElement.parentElement.style.display='none'">×</span>
            <h2>THIẾT LẬP MẬT KHẨU MỚI</h2>
            <button type="button" id="resend-btn">Không nhận được mã OTP. Gửi lại mã</button>
            <div id="countdown">Thời gian còn lại: <span id="timer">03:00</span></div>
            <form method="POST" action="{{ route('handle.verifyOtp') }}">
                @csrf
                <div class="otp-group">
                    @for($i = 0; $i < 6; $i++)
                        <input type="text" name="otp[]" maxlength="1" required>
                    @endfor
                </div>
                <input type="hidden" name="user_id" value="{{ session('otp_user_id') }}">
                <div class="button-group">
                    <a href="{{ route('forgot-password') }}" class="back-btn">Trở về</a>
                    <button type="submit" class="submit-btn">Khôi phục mật khẩu</button>
                </div>
            </form>
        </div>
    </div>

    <div id="reset-password-modal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="this.parentElement.parentElement.style.display='none'">×</span>
            <h2>THIẾT LẬP MẬT KHẨU MỚI</h2>
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
    </div>

    <div class="main-content">
        <div class="register-form">
            <h2>ĐĂNG KÝ TÀI KHOẢN</h2>
            @if(session('success') && request()->routeIs('handle.register'))
                <div class="message success">{{ session('success') }}</div>
            @endif
            @if($errors->any())
                <div class="message error">
                    <ul>
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('handle.register') }}" method="POST">
                @csrf
                <div style="display: flex; flex-direction: column; gap: 10px;">
                    <div style="display: flex; gap: 10px;">
                        <div style="flex: 1;">
                            <label>Tên cửa hàng *</label>
                            <input type="text" name="store_name" required>
                        </div>
                        <div style="flex: 1;">
                            <label>Số điện thoại *</label>
                            <input type="text" name="phone" required>
                        </div>
                        <div style="flex: 1;">
                            <label>Email</label>
                            <input type="email" name="email" required>
                        </div>
                    </div>
                    <div style="display: flex; gap: 10px;">
                        <div style="flex: 1; position: relative;">
                            <label>Mật khẩu *</label>
                            <input type="password" name="password" placeholder="Nhập mật khẩu..." style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px; box-sizing: border-box; height: 40px; padding-right: 40px;" required>
                            <span class="toggle-icon" onclick="this.previousElementSibling.type = this.previousElementSibling.type === 'password' ? 'text' : 'password';" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; font-size: 14px; color: #000;">👁</span>
                        </div>
                        <div style="flex: 1; position: relative;">
                            <label>Xác nhận mật khẩu *</label>
                            <input type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu..." style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px; box-sizing: border-box; height: 40px; padding-right: 40px;" required>
                            <span class="toggle-icon" onclick="this.previousElementSibling.type = this.previousElementSibling.type === 'password' ? 'text' : 'password';" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; font-size: 14px; color: #000;">👁</span>
                        </div>
                    </div>
                    <div>
                        <label>Địa chỉ</label>
                        <input type="text" name="address" placeholder="Nhập địa chỉ...">
                    </div>
                    <div style="display: flex; gap: 10px;">
                        <div style="flex: 1;">
                            <label>Phường/Xã</label>
                            <input type="text" name="ward">
                        </div>
                        <div style="flex: 1;">
                            <label>Quận/Huyện</label>
                            <input type="text" name="district">
                        </div>
                        <div style="flex: 1;">
                            <label>Thành phố</label>
                            <input type="text" name="city">
                        </div>
                    </div>
                    <label class="checkbox-label">
                        <input type="checkbox" name="agreed_policy" required>
                        Tôi đã đọc và đồng ý với <a href="#" style="color: #f4a261; text-decoration: none;">chính sách bảo mật thông tin</a>
                    </label>
                    <button type="submit">Đăng ký ngay</button>
                </div>
            </form>
        </div>
        <div class="services">
            <h3>DỊCH VỤ CỦA CHÚNG TÔI</h3>
            <div class="service-grid">
                <div class="service-row">
                    <div class="service-item">
                        <img src="{{ asset('images/via-express.png') }}" alt="VIA Express">
                        <a href="#">VIA Express</a>
                    </div>
                    <div class="service-item">
                        <img src="{{ asset('images/via-fast.png') }}" alt="VIA Fast">
                        <a href="#">VIA Fast</a>
                    </div>
                </div>
                <div class="service-row">
                    <div class="service-item">
                        <img src="{{ asset('images/via-super.png') }}" alt="VIA Super">
                        <a href="#">VIA Super</a>
                    </div>
                    <div class="service-item">
                        <img src="{{ asset('images/via-fresh.png') }}" alt="VIA Fresh">
                        <a href="#">VIA Fresh</a>
                    </div>
                </div>
                <div class="service-center">
                    <div class="service-item">
                        <img src="{{ asset('images/via-international.png') }}" alt="VIA International">
                        <a href="#">VIA International</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="successNotification" class="success-notification">
        <span class="close-btn">×</span>
        <i class="fas fa-shield-check check-icon"></i>
        <h3>ĐĂNG KÝ THÀNH CÔNG</h3>
        <p>Đề nghị dùng dịch vụ với chúng tôi, bạn có muốn Ký kết hợp đồng điện tử ngay?</p>
        <div class="buttons">
            <button class="login-btn">Đăng nhập</button>
            <button class="cooperate-btn">Ký kết hợp đồng</button>
        </div>
    </div>

    <div class="brand-icons-section">
        <h3 style="text-align: center; color: #333; margin-bottom: 20px;">KHÁCH HÀNG TIÊU BIỂU</h3>
        <div class="brand-icons">
            <span class="brand-icon tiktok"><i class="fab fa-tiktok"></i> TikTok</span>
            <span class="brand-icon shopee"><i class="fas fa-store"></i> Shopee</span>
            <span class="brand-icon oppo"><i class="fas fa-mobile-alt"></i> OPPO</span>
            <span class="brand-icon tiki"><i class="fas fa-envelope-open-text"></i> Tiki.vn</span>
            <span class="brand-icon upos"><i class="fas fa-cash-register"></i> UPOS</span>
            <span class="brand-icon tgdd"><i class="fas fa-running"></i> Thegioididong</span>
        </div>
    </div>

    <div class="footer" style="background-color: #d4a017; padding: 20px; color: white; display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; font-family: Arial, sans-serif;">
        <div class="footer-left" style="flex: 1; display: flex; flex-direction: column; align-items: center;">
            <img src="{{ asset('images/via-logo.png') }}" alt="VIA Logo" style="max-height: 50px; margin-bottom: 10px;">
            <p style="margin: 5px 0; font-size: 16px;">CÔNG TY CỔ PHẦN VIA PHÁT TRIỂN</p>
            <p style="margin: 5px 0; font-size: 14px;">Ứng dụng thông minh VIA</p>
            <p style="margin: 5px 0; font-size: 14px;">Mã số thuế: 0106944214</p>
            <p style="margin: 5px 0; font-size: 14px;">Ngày hoạt động: 07/03/2014</p>
            <p style="margin: 5px 0; font-size: 14px;">Số 6 Tố Hữu, Trung Văn, Nam Từ Liêm, Hà Nội</p>
            <div style="display: flex; gap: 10px; justify-content: center; margin-top: 10px;">
                <i class="fab fa-facebook-f" style="font-size: 18px;"></i>
                <i class="fab fa-youtube" style="font-size: 18px;"></i>
                <i class="fab fa-instagram" style="font-size: 18px;"></i>
            </div>
        </div>
        <div class="footer-center" style="flex: 1; display: flex; flex-direction: column; align-items: center; text-align: center;">
            <p style="margin: 5px 0; font-size: 20px; font-weight: bold;">LIÊN HỆ</p>
            <p style="margin: 5px 0; font-size: 16px;">Email: <a href="mailto:support@via.com" style="color: white; text-decoration: none;">support@via.com</a></p>
            <p style="margin: 5px 0; font-size: 16px;">Hotline: 1900 1234</p>
            <p style="margin: 5px 0; font-size: 16px;">16 Ngõ 204, Trần Duy Hưng, Trung Hòa, Cầu Giấy, HN</p>
            <img src="{{ asset('images/bocongthuong.png') }}" alt="Small Image" style="max-height: 40px; margin-top: 10px; display: block; margin-left: auto; margin-right: auto;">
        </div>
        <div class="footer-right" style="flex: 1; display: flex; flex-direction: column; align-items: center;">
            <p style="margin: 5px 0; font-size: 20px; font-weight: bold;">TẢI ỨNG DỤNG</p>
            <div style="display: flex; gap: 10px; margin-top: 10px;">
                <img src="{{ asset('images/qrcode.png') }}" alt="QR Code" style="max-height: 80px;">
                <div style="display: flex; flex-direction: column; justify-content: center;">
                    <a href="#" style="display: inline-block; margin-top: 5px;">
                        <img src="{{ asset('images/appstore.png') }}" alt="App Store" style="max-height: 30px;">
                    </a>
                    <a href="#" style="display: inline-block; margin-top: 5px;">
                        <img src="{{ asset('images/googleplay.png') }}" alt="Google Play" style="max-height: 30px;">
                    </a>
                </div>
            </div>
        </div>
        <div class="footer-bottom" style="width: 100%; text-align: center; margin-top: 20px; font-size: 14px;">
            <p>CHÍNH SÁCH BẢO MẬT</p>
            <p>Copyright © 2025 VIA JSC. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
