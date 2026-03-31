<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BangunImpian - Solusi Konstruksi Terpercaya')</title>
    <link rel="icon" type="image/png" href="https://img.icons8.com/ios-filled/50/000000/home.png" />
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        :root {
            --primary: #2a5f7f;
            --accent: #e67e22;
            --dark: #1a1a1a;
            --light: #f9f9f9;
            --success: #27ae60;
            --danger: #e74c3c;
            --info: #3498db;
        }

        body {
            background-color: #fff;
            color: var(--dark);
            line-height: 1.6;
        }

        /* ===== NAVBAR ===== */
        .navbar {
            background: linear-gradient(135deg, var(--primary) 0%, #1e4556 100%);
            padding: 1rem 0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: 800;
            color: white !important;
            letter-spacing: -1px;
        }

        .navbar-brand span {
            color: var(--accent);
        }

        .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.8) !important;
            font-weight: 500;
            margin: 0 0.5rem;
            transition: all 0.3s ease;
            position: relative;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: var(--accent) !important;
        }

        .navbar-nav .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--accent);
            border-radius: 2px;
        }

        /* ===== HERO SECTION ===== */
        .hero-section {
            min-height: 600px;
            background: linear-gradient(135deg, rgba(42, 95, 127, 0.25) 0%, rgba(30, 69, 86, 0.25) 100%), url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=1200&h=600&fit=crop') center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            text-align: center;
            color: white;
            z-index: 2;
            max-width: 800px;
            animation: slideUp 0.8s ease;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            line-height: 1.2;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .hero-content p {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
            opacity: 0.95;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-primary-custom {
            background: var(--accent);
            color: white;
            padding: 12px 40px;
            font-weight: 600;
            border: none;
            border-radius: 50px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
        }

        .btn-primary-custom:hover {
            background: #d45a0a;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(230, 126, 34, 0.3);
            color: white;
        }

        .btn-secondary-custom {
            background: transparent;
            color: white;
            padding: 12px 40px;
            font-weight: 600;
            border: 2px solid white;
            border-radius: 50px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
        }

        .btn-secondary-custom:hover {
            background: white;
            color: var(--primary);
            transform: translateY(-3px);
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ===== SECTION STYLING ===== */
        section {
            padding: 80px 0;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 4px;
            background: var(--accent);
            border-radius: 2px;
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 3rem;
        }

        /* ===== ABOUT SECTION ===== */
        .about-section {
            background: var(--light);
        }

        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .about-text h2 {
            font-size: 2.2rem;
            color: var(--primary);
            margin-bottom: 1.5rem;
            font-weight: 700;
        }

        .about-text p {
            font-size: 1rem;
            color: #555;
            margin-bottom: 1.5rem;
            line-height: 1.8;
        }

        .about-stats {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-top: 2rem;
        }

        .stat-card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            text-align: center;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        .stat-number {
            font-size: 2rem;
            color: var(--accent);
            font-weight: 800;
        }

        .stat-label {
            color: #666;
            font-weight: 500;
            margin-top: 0.5rem;
        }

        .about-image img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        /* ===== SERVICES SECTION ===== */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .service-card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border-top: 4px solid var(--primary);
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .service-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .service-card h3 {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 1rem;
            font-size: 1.3rem;
        }

        .service-card p {
            color: #666;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        /* ===== WHATSAPP BUTTON ===== */
        .whatsapp-button {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: #25D366;
            color: white;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            box-shadow: 0 4px 16px rgba(37, 211, 102, 0.4);
            transition: all 0.3s ease;
            z-index: 999;
        }

        .whatsapp-button:hover {
            background-color: #1ECB4F;
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(37, 211, 102, 0.6);
            color: white;
        }

        .whatsapp-button i {
            font-size: 2rem;
        }

        /* ===== FOOTER ===== */
        .footer {
            background: linear-gradient(135deg, var(--primary) 0%, #1e4556 100%);
            color: white;
            padding: 3rem 0 1rem;
        }

        .footer h5 {
            color: var(--accent);
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .footer p {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.8;
        }

        .footer a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer a:hover {
            color: var(--accent);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            padding-top: 2rem;
            margin-top: 2rem;
            text-align: center;
            color: rgba(255, 255, 255, 0.7);
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.2rem;
            }

            .hero-content p {
                font-size: 1rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .about-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .services-grid {
                grid-template-columns: 1fr;
            }

            .about-stats {
                grid-template-columns: 1fr;
            }

            .whatsapp-button {
                width: 65px;
                height: 65px;
                bottom: 20px;
                right: 20px;
            }

            .whatsapp-button i {
                font-size: 1.5rem;
            }

            section {
                padding: 50px 0;
            }
        }
    </style>

    @yield('extra-css')
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                Bangun<span>Impian</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() === 'home' ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() === 'tentang' ? 'active' : '' }}" href="{{ route('tentang') }}">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() === 'layanan' ? 'active' : '' }}" href="{{ route('layanan') }}">Layanan Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() === 'portofolio' ? 'active' : '' }}" href="{{ route('portofolio') }}">Portofolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() === 'kontak' ? 'active' : '' }}" href="{{ route('kontak') }}">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- PAGE CONTENT -->
    @yield('content')  

    <!-- WHATSAPP BUTTON -->
    <a href="https://wa.me/6281331135822?text=Halo%20BangunImpian%20saya%20ingin%20konsultasi%20mengenai%20jasa%20konstruksi%20dan%20desain%20bangunan." 
       target="_blank" title="Chat WhatsApp" class="whatsapp-button">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5>BangunImpian</h5>
                    <p>Solusi lengkap untuk konstruksi, desain, dan renovasi bangunan berkualitas dengan harga terjangkau.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Tautan Cepat</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}">Beranda</a></li>
                        <li><a href="{{ route('tentang') }}">Tentang Kami</a></li>
                        <li><a href="{{ route('layanan') }}">Layanan Kami</a></li>
                        <li><a href="{{ route('portofolio') }}">Portofolio</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Kontak</h5>
                    <p>📞 <a href="tel:+6285733867375">+62 813 3113 5822</a></p>
                    <p>📧 <a href="mailto:info@bangunimpian.com">infobangunimpian@gmail.com</a></p>
                    <p>📍 Jl. Pakis 2 No 16, Surabaya</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 BangunImpian. All rights reserved. | <a href="#">Privacy Policy</a></p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('extra-js')
</body>
</html>
