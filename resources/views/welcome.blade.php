<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang chủ VIA</title>
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
    justify-content: center;
    padding: 20px;
    width: 100%;
    min-width: 1200px;
    background-color: #d4a017;
}

.header .search-section {
    background: #fff;
    padding: 15px;
    border-radius: 10px;
    width: 50%;
    max-width: 600px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    color: #333;
    height: auto;
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    z-index: 1;
    margin-top: 30px;
}

.header .search-section .form-group {
    display: flex;
    gap: 10px;
    width: 100%;
}

.header .search-section input {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    width: 100%;
    height: 40px;
    box-sizing: border-box;
}

.header .search-section input::placeholder {
    color: #999;
    opacity: 1;
}

.header .search-section button {
    padding: 10px 20px;
    background: #f4a261;
    border: none;
    color: white;
    font-weight: bold;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    height: 40px;
    transition: background 0.3s;
}

.header .search-section button:hover {
    background: #e76f51;
}

/* Đưa tiêu đề tìm kiếm ra ngoài form */
.header .search-section h4 {
    color: #2e0505;
    font-size: 18px;
    font-weight: bold;
    margin-left: 10px;
    position: absolute;
    top: -40px;
    left: 0;
}

/* USER SECTION sửa lại toàn bộ */
.header .user-section {
    position: absolute;
    top: 40px; /* Ngang dòng “TÌM KIẾM NỘI DUNG” */
    right: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    color: white;
    text-align: center;
    gap: 8px;
}

.header .user-section span:first-child {
    font-size: 17px;
    font-weight: normal;
    line-height: 1;
}

.header .user-section span:nth-child(2) {
    font-size: 16px;
    font-weight: bold;
    line-height: 1;
    text-transform: uppercase;
}

.header .user-section img {
    border-radius: 5px;
    width: 60px;
    height: 60px;
    object-fit: cover;
    border: 2px solid #fff;
}

.header .user-section .logout-btn {
    padding: 6px 12px;
    background: #f4a261;
    border: none;
    color: white;
    font-size: 12px;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s;
}

.header .user-section .logout-btn:hover {
    background: #e76f51;
}

/* Sóng vàng trang trí */
.header .wave {
    position: absolute;
    bottom: -10px;
    left: 0;
    width: 100%;
    height: 50px;
    background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxNDQwIDMyMCI+PHBhdGggZmlsbD0iI2ZmZiIgZD0iTTE0NDAgMzJIMHctMTQ0MEw3MjAgM3oiLz48L3N2Zz4=') repeat-x;
    background-size: contain;
}

        /* Rest of the styles remain the same as previous code */
        .main-content {
            display: flex;
            flex: 1;
            padding: 20px;
            justify-content: space-between;
            align-items: stretch;
            width: 100%;
            max-width: none;
        }

        .success-form {
            flex: 1;
            max-width: 50%;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .success-form h2 {
            color: #f4a261;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .success-form p {
            color: #333;
            font-size: 16px;
            margin-bottom: 10px;
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
    </style>
</head>
<body>
    <div class="header">
        <div class="wave"></div>
        <div class="search-section">
            <h4>TÌM KIẾM NỘI DUNG</h4>
            <div class="form-group">
                <input type="text" placeholder="Nhập thông tin cần tìm" id="searchInput">
                <button type="button" onclick="searchContent()">Tìm</button>
            </div>
        </div>
       <div class="user-section">
    <span>Xin chào bạn</span>
    <span>{{ $storeName }}</span>
    <img src="{{ asset('images/user-avatar.jpg') }}" alt="User Avatar">
    <button class="logout-btn" onclick="logout()">Thoát</button>
</div>

    </div>
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

    <div class="main-content">
        <div class="success-form">
            <h2>BẠN ĐÃ ĐĂNG NHẬP THÀNH CÔNG</h2>
            <p>Chào mừng {{ $storeName }}! Bạn đã truy cập vào hệ thống</p>
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

    <div class="brand-icons-section">
        <h3>KHÁCH HÀNG TIÊU BIỂU</h3>
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
