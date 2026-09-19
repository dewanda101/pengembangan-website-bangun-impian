<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BangunImpian - Jasa Arsitek & Konstruksi Profesional Surabaya')</title>
    <meta name="description" content="BangunImpian - Jasa desain arsitektur, konstruksi, interior, dan renovasi profesional di Surabaya. 35+ tahun pengalaman, 200+ proyek selesai.">
    <link rel="icon" type="image/png" href="https://img.icons8.com/ios-filled/50/ffffff/home.png" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- AOS Animation -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">

    <style>
        *, *::before, *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary:    #0e1b2e;
            --primary-md: #1a2f4a;
            --accent:     #c8a96e;
            --accent-lt:  #e8c98e;
            --gold:       #b8943f;
            --white:      #ffffff;
            --off-white:  #f8f6f2;
            --text-dark:  #1a1a1a;
            --text-mid:   #555555;
            --text-light: #888888;
            --border:     rgba(200,169,110,0.25);
            --card-bg:    #ffffff;
            --section-bg: #f4f2ee;
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--white);
            color: var(--text-dark);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* ========== NAVBAR ========== */
        #navbar {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 1000;
            transition: all 0.4s ease;
            padding: 0;
        }

        #navbar.transparent {
            background: transparent;
        }

        #navbar.scrolled {
            background: rgba(14, 27, 46, 0.97);
            backdrop-filter: blur(12px);
            box-shadow: 0 2px 30px rgba(0,0,0,0.35);
        }

        .nav-inner {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 80px;
        }

        .nav-logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.65rem;
            font-weight: 700;
            color: var(--white);
            text-decoration: none;
            letter-spacing: -0.5px;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .nav-logo .logo-icon {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, var(--accent), var(--gold));
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
        }

        .nav-logo span { color: var(--accent); }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            list-style: none;
        }

        .nav-links a {
            color: rgba(255,255,255,0.85);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            transition: all 0.3s ease;
            position: relative;
            letter-spacing: 0.02em;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--accent);
            background: rgba(200,169,110,0.1);
        }

        .nav-links a.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%; transform: translateX(-50%);
            width: 20px; height: 2px;
            background: var(--accent);
            border-radius: 2px;
        }

        .nav-cta {
            background: linear-gradient(135deg, var(--accent), var(--gold)) !important;
            color: var(--primary) !important;
            font-weight: 700 !important;
            border-radius: 50px !important;
            padding: 0.5rem 1.4rem !important;
        }

        .nav-cta:hover {
            background: linear-gradient(135deg, var(--accent-lt), var(--accent)) !important;
            color: var(--primary) !important;
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(200,169,110,0.4) !important;
        }

        .nav-toggle {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 0.5rem;
        }

        /* ========== BUTTONS ========== */
        .btn-gold {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: linear-gradient(135deg, var(--accent), var(--gold));
            color: var(--primary);
            font-weight: 700;
            font-size: 0.95rem;
            padding: 0.9rem 2.2rem;
            border-radius: 50px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            letter-spacing: 0.02em;
        }

        .btn-gold:hover {
            background: linear-gradient(135deg, var(--accent-lt), var(--accent));
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(200,169,110,0.45);
            color: var(--primary);
        }

        .btn-outline-white {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: transparent;
            color: white;
            font-weight: 600;
            font-size: 0.95rem;
            padding: 0.85rem 2.2rem;
            border-radius: 50px;
            text-decoration: none;
            border: 2px solid rgba(255,255,255,0.6);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-outline-white:hover {
            background: rgba(255,255,255,0.12);
            border-color: white;
            color: white;
            transform: translateY(-2px);
        }

        .btn-outline-dark {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: transparent;
            color: var(--primary);
            font-weight: 600;
            font-size: 0.95rem;
            padding: 0.85rem 2.2rem;
            border-radius: 50px;
            text-decoration: none;
            border: 2px solid var(--primary);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-outline-dark:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
        }

        /* ========== SECTION HELPERS ========== */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .section-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(200,169,110,0.12);
            color: var(--accent);
            border: 1px solid rgba(200,169,110,0.3);
            padding: 0.4rem 1.1rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 1rem;
        }

        .section-badge.dark {
            background: rgba(200,169,110,0.15);
            color: var(--accent-lt);
            border-color: rgba(200,169,110,0.35);
        }

        .section-heading {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 4vw, 2.8rem);
            font-weight: 700;
            color: var(--primary);
            line-height: 1.25;
            margin-bottom: 1rem;
        }

        .section-heading .accent { color: var(--gold); }

        .section-heading.light { color: var(--white); }

        .section-desc {
            font-size: 1rem;
            color: var(--text-mid);
            max-width: 580px;
            line-height: 1.75;
        }

        .section-desc.light { color: rgba(255,255,255,0.75); }

        /* ========== WHATSAPP FLOAT ========== */
        .wa-float {
            position: fixed;
            bottom: 32px;
            right: 32px;
            z-index: 900;
        }

        .wa-float a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            background: #25D366;
            color: white;
            border-radius: 50%;
            font-size: 1.7rem;
            text-decoration: none;
            box-shadow: 0 4px 20px rgba(37,211,102,0.45);
            transition: all 0.3s ease;
            animation: pulse-wa 2.5s infinite;
        }

        .wa-float a:hover {
            background: #1ebe5d;
            transform: scale(1.12);
            box-shadow: 0 6px 28px rgba(37,211,102,0.6);
            color: white;
        }

        @keyframes pulse-wa {
            0%, 100% { box-shadow: 0 4px 20px rgba(37,211,102,0.45); }
            50% { box-shadow: 0 4px 32px rgba(37,211,102,0.7); }
        }

        /* ========== FOOTER ========== */
        .site-footer {
            background: var(--primary);
            color: white;
            padding: 5rem 0 0;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.6fr 1fr 1fr 1.3fr;
            gap: 3rem;
            padding-bottom: 3.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .footer-brand .logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: white;
            margin-bottom: 1rem;
            display: block;
        }

        .footer-brand .logo span { color: var(--accent); }

        .footer-brand p {
            color: rgba(255,255,255,0.65);
            font-size: 0.9rem;
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }

        .footer-socials {
            display: flex;
            gap: 0.75rem;
        }

        .footer-socials a {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.15);
            color: rgba(255,255,255,0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            text-decoration: none;
            transition: all 0.3s;
        }

        .footer-socials a:hover {
            background: var(--accent);
            border-color: var(--accent);
            color: var(--primary);
            transform: translateY(-3px);
        }

        .footer-col h6 {
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 1.4rem;
        }

        .footer-col ul {
            list-style: none;
        }

        .footer-col ul li {
            margin-bottom: 0.65rem;
        }

        .footer-col ul li a {
            color: rgba(255,255,255,0.65);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        .footer-col ul li a:hover { color: var(--accent); }

        .footer-contact-item {
            display: flex;
            gap: 0.75rem;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .footer-contact-item .icon {
            width: 34px;
            height: 34px;
            min-width: 34px;
            background: rgba(200,169,110,0.15);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent);
            font-size: 0.85rem;
        }

        .footer-contact-item .info {
            font-size: 0.88rem;
            color: rgba(255,255,255,0.65);
            line-height: 1.5;
        }

        .footer-contact-item .info a {
            color: rgba(255,255,255,0.65);
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-contact-item .info a:hover { color: var(--accent); }

        .footer-bottom {
            padding: 1.5rem 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .footer-bottom p {
            color: rgba(255,255,255,0.45);
            font-size: 0.85rem;
        }

        .footer-bottom a {
            color: var(--accent);
            text-decoration: none;
        }

        /* ========== RESPONSIVE NAV ========== */
        @media (max-width: 900px) {
            .nav-toggle { display: block; }

            .nav-links {
                position: fixed;
                inset: 0;
                top: 80px;
                background: rgba(14,27,46,0.98);
                backdrop-filter: blur(20px);
                flex-direction: column;
                gap: 0;
                padding: 2rem 1.5rem;
                transform: translateX(100%);
                transition: transform 0.4s ease;
                z-index: 999;
            }

            .nav-links.open { transform: translateX(0); }

            .nav-links a {
                padding: 1rem 1.5rem;
                font-size: 1.05rem;
                border-radius: 10px;
                width: 100%;
            }
        }

        @media (max-width: 768px) {
            .footer-grid {
                grid-template-columns: 1fr 1fr;
                gap: 2rem;
            }
        }

        @media (max-width: 480px) {
            .footer-grid {
                grid-template-columns: 1fr;
            }

            .footer-bottom {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>

    @yield('extra-css')
</head>
<body>

    <!-- ===== NAVBAR ===== -->
    <nav id="navbar" class="transparent">
        <div class="nav-inner">
            <a href="{{ route('home') }}" class="nav-logo" id="nav-logo-link">
                <div class="logo-icon"><i class="fas fa-drafting-compass"></i></div>
                Bangun<span>Impian</span>
            </a>

            <button class="nav-toggle" id="nav-toggle" aria-label="Menu">
                <i class="fas fa-bars"></i>
            </button>

            <ul class="nav-links" id="nav-links">
                <li><a href="{{ route('home') }}" class="{{ Route::currentRouteName() === 'home' ? 'active' : '' }}">Beranda</a></li>
                <li><a href="{{ route('tentang') }}" class="{{ Route::currentRouteName() === 'tentang' ? 'active' : '' }}">Tentang Kami</a></li>
                <li><a href="{{ route('layanan') }}" class="{{ Route::currentRouteName() === 'layanan' ? 'active' : '' }}">Layanan</a></li>
                <li><a href="{{ route('portofolio') }}" class="{{ Route::currentRouteName() === 'portofolio' ? 'active' : '' }}">Portofolio</a></li>
                <li><a href="{{ route('kontak') }}" class="{{ Route::currentRouteName() === 'kontak' ? 'active' : '' }} nav-cta">Konsultasi Gratis</a></li>
            </ul>
        </div>
    </nav>

    <!-- ===== PAGE CONTENT ===== -->
    @yield('content')

    <!-- ===== WHATSAPP FLOAT ===== -->
    <div class="wa-float">
        <a href="https://wa.me/6285733867375?text=Halo%20BangunImpian%2C%20saya%20ingin%20konsultasi%20mengenai%20proyek%20bangunan%20saya."
           target="_blank" rel="noopener" title="Chat WhatsApp kami">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>

    <!-- ===== FOOTER ===== -->
    <footer class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <!-- Brand -->
                <div class="footer-brand">
                    <span class="logo">Bangun<span>Impian</span></span>
                    <p>Mitra terpercaya untuk mewujudkan impian bangunan Anda. Kami menghadirkan desain elegan, konstruksi kokoh, dan layanan purna jual terbaik di Surabaya.</p>
                    <div class="footer-socials">
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://wa.me/6285733867375" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                        <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <!-- Tautan -->
                <div class="footer-col">
                    <h6>Navigasi</h6>
                    <ul>
                        <li><a href="{{ route('home') }}"><i class="fas fa-chevron-right fa-xs"></i> Beranda</a></li>
                        <li><a href="{{ route('tentang') }}"><i class="fas fa-chevron-right fa-xs"></i> Tentang Kami</a></li>
                        <li><a href="{{ route('layanan') }}"><i class="fas fa-chevron-right fa-xs"></i> Layanan</a></li>
                        <li><a href="{{ route('portofolio') }}"><i class="fas fa-chevron-right fa-xs"></i> Portofolio</a></li>
                        <li><a href="{{ route('kontak') }}"><i class="fas fa-chevron-right fa-xs"></i> Kontak</a></li>
                    </ul>
                </div>

                <!-- Layanan -->
                <div class="footer-col">
                    <h6>Layanan</h6>
                    <ul>
                        <li><a href="{{ route('layanan') }}"><i class="fas fa-chevron-right fa-xs"></i> Desain Arsitektur</a></li>
                        <li><a href="{{ route('layanan') }}"><i class="fas fa-chevron-right fa-xs"></i> Konstruksi</a></li>
                        <li><a href="{{ route('layanan') }}"><i class="fas fa-chevron-right fa-xs"></i> Interior Design</a></li>
                        <li><a href="{{ route('layanan') }}"><i class="fas fa-chevron-right fa-xs"></i> Renovasi</a></li>
                        <li><a href="{{ route('layanan') }}"><i class="fas fa-chevron-right fa-xs"></i> Desain Komersial</a></li>
                    </ul>
                </div>

                <!-- Kontak -->
                <div class="footer-col">
                    <h6>Hubungi Kami</h6>
                    <div class="footer-contact-item">
                        <div class="icon"><i class="fas fa-phone"></i></div>
                        <div class="info"><a href="tel:+6281331135822">+62 857 3386 7375</a></div>
                    </div>
                    <div class="footer-contact-item">
                        <div class="icon"><i class="fas fa-envelope"></i></div>
                        <div class="info"><a href="mailto:infobangunimpian@gmail.com">infobangunimpian@gmail.com</a></div>
                    </div>
                    <div class="footer-contact-item">
                        <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="info">Jl. Pakis 2 No 16, Surabaya, Jawa Timur</div>
                    </div>
                    <div class="footer-contact-item">
                        <div class="icon"><i class="fas fa-clock"></i></div>
                        <div class="info">Senin – Sabtu: 06.00 – 22.00 WIB</div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2025 BangunImpian. Seluruh hak dilindungi.</p>
                <!-- <p>Dibuat dengan <i class="fas fa-heart" style="color:var(--accent);"></i> di Surabaya</p> -->
            </div>
        </div>
    </footer>

    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 700, once: true, offset: 60 });

        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        const isHomePage = {{ Route::currentRouteName() === 'home' ? 'true' : 'false' }};

        function updateNavbar() {
            if (isHomePage) {
                if (window.scrollY > 60) {
                    navbar.classList.remove('transparent');
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                    navbar.classList.add('transparent');
                }
            } else {
                navbar.classList.remove('transparent');
                navbar.classList.add('scrolled');
            }
        }

        window.addEventListener('scroll', updateNavbar);
        updateNavbar();

        // Mobile menu toggle
        const toggle = document.getElementById('nav-toggle');
        const navLinks = document.getElementById('nav-links');

        toggle.addEventListener('click', () => {
            navLinks.classList.toggle('open');
            toggle.querySelector('i').className = navLinks.classList.contains('open')
                ? 'fas fa-times' : 'fas fa-bars';
        });
    </script>

    @yield('extra-js')
</body>
</html>
