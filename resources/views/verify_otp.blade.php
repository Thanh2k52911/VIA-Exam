<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thiết lập mật khẩu mới</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 20px;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }
        h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }
        #countdown {
            color: #fd7e14;
            font-size: 16px;
            margin-bottom: 20px;
        }
        .otp-group {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        input[type="text"] {
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 20px;
            border: 2px solid #ced4da;
            border-radius: 5px;
            margin: 0 5px;
            outline: none;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus {
            border-color: #fd7e14;
        }
        input[type="text"].filled {
            border-color: #fd7e14;
            background-color: #fff3e6;
        }
        button[type="submit"] {
            background-color: #fd7e14;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button[type="submit"]:hover {
            background-color: #e06c00;
        }
        #resend-btn {
            background-color: orange;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
            transition: background-color 0.3s;
        }
        #resend-btn:hover {
            background-color: #cc8400;
        }
        #resend-btn:disabled {
            background-color: #6c757d;
            cursor: not-allowed;
        }
        .button-group {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .button-group .back-btn {
            background-color: #6c757d;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s;
        }
        .button-group .back-btn:hover {
            background-color: #5a6268;
        }
        .button-group .submit-btn {
            background-color: #fd7e14;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .button-group .submit-btn:hover {
            background-color: #e06c00;
        }
        input[type="hidden"] {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
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

    <script>

        let timeLeft = 180;
        const timerElement = document.getElementById('timer');
        const resendBtn = document.getElementById('resend-btn');
        const inputs = document.querySelectorAll('input[name="otp[]"]');
        let lastResendTime = null;

        function updateTimer() {
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            timerElement.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            timeLeft--;

            if (timeLeft < 0) {
                timerElement.textContent = '00:00';
                clearInterval(countdownInterval);
            }


            if (lastResendTime) {
                const timeSinceLastResend = Math.floor((Date.now() - lastResendTime) / 1000);
                if (timeSinceLastResend < 60) {
                    resendBtn.disabled = true;
                    resendBtn.setAttribute('disabled', 'disabled');
                } else {
                    resendBtn.disabled = false;
                    resendBtn.removeAttribute('disabled');
                }
            }
        }

        const countdownInterval = setInterval(updateTimer, 1000);


        resendBtn.addEventListener('click', (e) => {
            if (resendBtn.disabled) {
                e.preventDefault();
                return;
            }


            resendBtn.disabled = true;
            resendBtn.setAttribute('disabled', 'disabled');

            fetch('{{ route('resend-otp') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(error => { throw new Error(error.message || `HTTP error! Status: ${response.status}`); });
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    timeLeft = 180;
                    timerElement.textContent = '03:00';
                    clearInterval(countdownInterval);
                    countdownInterval = setInterval(updateTimer, 1000);
                    lastResendTime = Date.now();
                } else {
                    alert(data.error);
                }
            })
            .catch(error => {
                console.error('Error:', error.message);
                alert('Đã có lỗi xảy ra, vui lòng thử lại: ' + error.message);
            })
            .finally(() => {

                resendBtn.disabled = false;
                resendBtn.removeAttribute('disabled');
            });
        });


        inputs.forEach((input, i) => {
            input.addEventListener('input', () => {
                if (input.value.length > 0 && i < inputs.length - 1) {
                    inputs[i + 1].focus();
                }
                if (input.value) {
                    input.classList.add('filled');
                } else {
                    input.classList.remove('filled');
                }
            });
        });
    </script>
</body>
</html>
