@extends('layouts.app')

@section('title', 'BangunImpian – Jasa Arsitek & Konstruksi Profesional Surabaya')

@section('extra-css')
<style>
    /* =============================================
       HOME PAGE STYLES
    ============================================= */

    /* -------- HERO -------- */
    .hero {
        position: relative;
        min-height: calc(100vh - 100px);
        display: flex;
        align-items: center;
        overflow: hidden;
        background: var(--primary);
    }

    .hero-bg {
        position: absolute;
        inset: 0;
        background: url('/images/hero-bg.jpg') center/cover no-repeat;
        transform: scale(1.06);
        transition: transform 8s ease;
        will-change: transform;
    }

    .hero:hover .hero-bg { transform: scale(1); }

    .hero-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(
            105deg,
            rgba(10, 20, 38, 0.88) 0%,
            rgba(14, 27, 46, 0.72) 50%,
            rgba(14, 27, 46, 0.45) 100%
        );
    }

    .hero-content {
        position: relative;
        z-index: 2;
        padding: 8rem 0 4rem;
        max-width: 700px;
    }

    .hero-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
        color: var(--accent);
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        margin-bottom: 1.4rem;
    }

    .hero-eyebrow .line {
        width: 30px;
        height: 1.5px;
        background: var(--accent);
    }

    .hero h1 {
        font-family: 'Playfair Display', serif;
        font-size: clamp(2.8rem, 6vw, 4.5rem);
        font-weight: 700;
        color: white;
        line-height: 1.12;
        margin-bottom: 1.4rem;
        letter-spacing: -0.5px;
    }

    .hero h1 .gold { color: var(--accent); }

    .hero-desc {
        font-size: 1.1rem;
        color: rgba(255,255,255,0.78);
        line-height: 1.75;
        margin-bottom: 2.5rem;
        max-width: 520px;
    }

    .hero-actions {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .hero-stats {
        position: relative;
        z-index: 2;
        background: var(--primary);
        border-top: 1px solid rgba(200,169,110,0.2);
    }

    .hero-stats-inner {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 0;
    }

    .stat-item {
        padding: 1.8rem 2rem;
        border-right: 1px solid rgba(255,255,255,0.08);
        text-align: center;
    }

    .stat-item:last-child { border-right: none; }

    .stat-num {
        font-family: 'Playfair Display', serif;
        font-size: 2.4rem;
        font-weight: 700;
        color: var(--accent);
        line-height: 1;
        margin-bottom: 0.25rem;
    }

    .stat-label {
        font-size: 0.82rem;
        color: rgba(255,255,255,0.6);
        letter-spacing: 0.04em;
        text-transform: uppercase;
    }

    /* -------- ABOUT STRIP -------- */
    .about-strip {
        background: var(--section-bg);
        padding: 6rem 0;
    }

    .about-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 5rem;
        align-items: center;
    }

    .about-image-wrap {
        position: relative;
    }

    .about-image-wrap img {
        width: 100%;
        border-radius: 16px;
        display: block;
        object-fit: cover;
        height: 500px;
        box-shadow: 0 30px 70px rgba(0,0,0,0.15);
    }

    .about-badge-float {
        position: absolute;
        bottom: -1.5rem;
        right: -1.5rem;
        background: var(--primary);
        color: white;
        padding: 1.6rem 2rem;
        border-radius: 16px;
        text-align: center;
        box-shadow: 0 16px 40px rgba(0,0,0,0.25);
        border: 1px solid rgba(200,169,110,0.25);
    }

    .about-badge-float strong {
        font-family: 'Playfair Display', serif;
        font-size: 2.6rem;
        color: var(--accent);
        display: block;
        line-height: 1;
    }

    .about-badge-float span {
        font-size: 0.78rem;
        color: rgba(255,255,255,0.65);
        letter-spacing: 0.06em;
        text-transform: uppercase;
    }

    .about-features {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
        margin-top: 2rem;
    }

    .about-feature {
        display: flex;
        align-items: flex-start;
        gap: 0.85rem;
        padding: 1.1rem;
        background: white;
        border-radius: 12px;
        border: 1px solid rgba(0,0,0,0.06);
        transition: all 0.3s;
    }

    .about-feature:hover {
        border-color: rgba(200,169,110,0.4);
        box-shadow: 0 8px 24px rgba(0,0,0,0.07);
        transform: translateY(-2px);
    }

    .about-feature .icon {
        width: 40px;
        height: 40px;
        min-width: 40px;
        border-radius: 10px;
        background: linear-gradient(135deg, var(--accent), var(--gold));
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 0.9rem;
    }

    .about-feature h5 {
        font-size: 0.88rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 0.2rem;
    }

    .about-feature p {
        font-size: 0.8rem;
        color: var(--text-light);
        line-height: 1.4;
    }

    /* -------- SERVICES -------- */
    .services-section {
        padding: 7rem 0;
        background: var(--primary);
    }

    .services-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 3.5rem;
        gap: 2rem;
        flex-wrap: wrap;
    }

    .services-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
    }

    .service-card {
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(200,169,110,0.15);
        border-radius: 16px;
        padding: 2.2rem;
        transition: all 0.4s ease;
        cursor: default;
        position: relative;
        overflow: hidden;
    }

    .service-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(200,169,110,0.08) 0%, transparent 60%);
        opacity: 0;
        transition: opacity 0.4s;
    }

    .service-card:hover {
        background: rgba(255,255,255,0.07);
        border-color: rgba(200,169,110,0.45);
        transform: translateY(-6px);
        box-shadow: 0 20px 50px rgba(0,0,0,0.3);
    }

    .service-card:hover::before { opacity: 1; }

    .service-icon-wrap {
        width: 56px;
        height: 56px;
        border-radius: 14px;
        background: linear-gradient(135deg, rgba(200,169,110,0.25), rgba(184,148,63,0.15));
        border: 1px solid rgba(200,169,110,0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        margin-bottom: 1.4rem;
        transition: all 0.3s;
    }

    .service-card:hover .service-icon-wrap {
        background: linear-gradient(135deg, var(--accent), var(--gold));
        border-color: transparent;
    }

    .service-card h3 {
        font-size: 1.1rem;
        font-weight: 700;
        color: white;
        margin-bottom: 0.75rem;
    }

    .service-card p {
        font-size: 0.88rem;
        color: rgba(255,255,255,0.55);
        line-height: 1.7;
        margin-bottom: 1.2rem;
    }

    .service-link {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        color: var(--accent);
        font-size: 0.85rem;
        font-weight: 600;
        text-decoration: none;
        transition: gap 0.3s;
    }

    .service-link:hover { gap: 0.7rem; color: var(--accent-lt); }

    /* -------- PORTFOLIO PREVIEW -------- */
    .portfolio-section {
        padding: 7rem 0;
        background: var(--white);
    }

    .portfolio-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 3rem;
        flex-wrap: wrap;
        gap: 1.5rem;
    }

    .portfolio-filter {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
        margin-bottom: 2rem;
    }

    .pf-btn {
        padding: 0.5rem 1.3rem;
        border-radius: 50px;
        border: 1px solid rgba(0,0,0,0.12);
        background: white;
        color: var(--text-mid);
        font-size: 0.85rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
    }

    .pf-btn.active, .pf-btn:hover {
        background: var(--primary);
        color: white;
        border-color: var(--primary);
    }

    .portfolio-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
    }

    .portfolio-card {
        border-radius: 16px;
        overflow: hidden;
        background: white;
        box-shadow: 0 4px 20px rgba(0,0,0,0.07);
        transition: all 0.4s ease;
        border: 1px solid rgba(0,0,0,0.06);
    }

    .portfolio-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 50px rgba(0,0,0,0.14);
    }

    .portfolio-img {
        position: relative;
        height: 240px;
        overflow: hidden;
    }

    .portfolio-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .portfolio-card:hover .portfolio-img img { transform: scale(1.08); }

    .portfolio-img-placeholder {
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-md) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: rgba(255,255,255,0.3);
        font-size: 3rem;
        transition: transform 0.6s ease;
    }

    .portfolio-card:hover .portfolio-img-placeholder { transform: scale(1.05); }

    .portfolio-badge {
        position: absolute;
        top: 1rem;
        left: 1rem;
        padding: 0.35rem 0.9rem;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .badge-rumah     { background: rgba(14,27,46,0.85); color: var(--accent); }
    .badge-komersial { background: rgba(200,169,110,0.9); color: var(--primary); }
    .badge-ibadah    { background: rgba(39,174,96,0.85); color: white; }
    .badge-lainya    { background: rgba(100,100,100,0.85); color: white; }

    .portfolio-body {
        padding: 1.5rem;
    }

    .portfolio-body h4 {
        font-size: 1rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 0.5rem;
        line-height: 1.35;
    }

    .portfolio-body p {
        font-size: 0.84rem;
        color: var(--text-light);
        line-height: 1.55;
        margin-bottom: 1rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .portfolio-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 0.75rem;
        border-top: 1px solid rgba(0,0,0,0.07);
    }

    .portfolio-meta span {
        font-size: 0.8rem;
        color: var(--text-light);
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }

    .portfolio-meta span i { color: var(--accent); }

    /* -------- PROCESS -------- */
    .process-section {
        padding: 7rem 0;
        background: var(--section-bg);
    }

    .process-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 2rem;
        margin-top: 4rem;
        position: relative;
    }

    .process-grid::before {
        content: '';
        position: absolute;
        top: 30px;
        left: calc(12.5% + 20px);
        right: calc(12.5% + 20px);
        height: 2px;
        background: linear-gradient(90deg, var(--accent), var(--primary));
        z-index: 0;
    }

    .process-step {
        text-align: center;
        position: relative;
        z-index: 1;
    }

    .process-num {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--accent), var(--gold));
        color: var(--primary);
        font-family: 'Playfair Display', serif;
        font-size: 1.4rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.2rem;
        box-shadow: 0 8px 24px rgba(200,169,110,0.35);
        border: 3px solid var(--section-bg);
    }

    .process-step h4 {
        font-size: 0.95rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 0.5rem;
    }

    .process-step p {
        font-size: 0.83rem;
        color: var(--text-light);
        line-height: 1.6;
    }

    /* -------- TESTIMONIAL -------- */
    .testimonial-section {
        padding: 7rem 0;
        background: var(--primary);
        overflow: hidden;
    }

    .testimonial-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
        margin-top: 3.5rem;
    }

    .testimonial-card {
        background: rgba(255,255,255,0.05);
        border: 1px solid rgba(200,169,110,0.15);
        border-radius: 16px;
        padding: 2rem;
        transition: all 0.4s;
    }

    .testimonial-card:hover {
        border-color: rgba(200,169,110,0.4);
        background: rgba(255,255,255,0.07);
        transform: translateY(-4px);
    }

    .testimonial-stars {
        color: var(--accent);
        font-size: 0.85rem;
        margin-bottom: 1rem;
        letter-spacing: 2px;
    }

    .testimonial-card blockquote {
        font-size: 0.9rem;
        color: rgba(255,255,255,0.7);
        line-height: 1.75;
        margin-bottom: 1.5rem;
        font-style: italic;
    }

    .testimonial-author {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .testimonial-avatar {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--accent), var(--gold));
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary);
        font-weight: 700;
        font-size: 1rem;
    }

    .testimonial-info strong {
        display: block;
        font-size: 0.88rem;
        font-weight: 700;
        color: white;
    }

    .testimonial-info span {
        font-size: 0.78rem;
        color: rgba(255,255,255,0.5);
    }

    /* -------- CTA -------- */
    .cta-section {
        padding: 7rem 0;
        background: var(--section-bg);
    }

    .cta-card {
        background: var(--primary);
        border-radius: 24px;
        padding: 5rem 4rem;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .cta-card::before {
        content: '';
        position: absolute;
        top: -60%;
        right: -10%;
        width: 400px;
        height: 400px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(200,169,110,0.18) 0%, transparent 70%);
    }

    .cta-card h2 {
        font-family: 'Playfair Display', serif;
        font-size: clamp(1.8rem, 3.5vw, 2.8rem);
        font-weight: 700;
        color: white;
        margin-bottom: 1rem;
        position: relative;
    }

    .cta-card h2 span { color: var(--accent); }

    .cta-card p {
        font-size: 1rem;
        color: rgba(255,255,255,0.7);
        max-width: 500px;
        margin: 0 auto 2.5rem;
        position: relative;
    }

    .cta-actions {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
        position: relative;
    }

    /* -------- RESPONSIVE -------- */

    /* Tablet landscape */
    @media (max-width: 1024px) {
        .services-grid { grid-template-columns: repeat(2, 1fr); }
        .portfolio-grid { grid-template-columns: repeat(2, 1fr); }
        .testimonial-grid { grid-template-columns: repeat(2, 1fr); }
        .hero-stats-inner { grid-template-columns: repeat(2, 1fr); }
        .process-grid { grid-template-columns: repeat(2, 1fr); }
        .process-grid::before { display: none; }

        .about-grid { gap: 3rem; }
        .about-image-wrap img { height: 400px; }

        .services-header { flex-direction: column; align-items: flex-start; }
        .portfolio-header { flex-direction: column; align-items: flex-start; }
    }

    /* Tablet portrait / large phone */
    @media (max-width: 768px) {
        .hero { min-height: auto; }
        .hero-content { padding: 7rem 0 3rem; }
        .hero h1 { font-size: 2.2rem; }
        .hero-desc { font-size: 0.95rem; max-width: 100%; }
        .hero-eyebrow { font-size: 0.7rem; }

        .hero-stats-inner { grid-template-columns: repeat(2, 1fr); }
        .stat-item { padding: 1.2rem 1rem; }
        .stat-item:nth-child(2) { border-right: none; }
        .stat-num { font-size: 1.8rem; }
        .stat-label { font-size: 0.72rem; }

        .about-grid { grid-template-columns: 1fr; gap: 2.5rem; }
        .about-image-wrap img { height: 300px; }
        .about-badge-float { position: static; margin-top: 1rem; display: inline-block; }
        .about-features { grid-template-columns: 1fr 1fr; }

        .services-grid { grid-template-columns: 1fr; }
        .portfolio-grid { grid-template-columns: 1fr; }
        .testimonial-grid { grid-template-columns: 1fr; }
        .process-grid { grid-template-columns: repeat(2, 1fr); }

        .cta-card { padding: 3rem 1.5rem; border-radius: 16px; }

        .section-heading { font-size: 1.8rem; }

        .services-section,
        .portfolio-section,
        .testimonial-section,
        .process-section,
        .cta-section,
        .about-strip { padding: 4rem 0; }
    }

    /* Small phone */
    @media (max-width: 480px) {
        .hero-content { padding: 6rem 0 2.5rem; }
        .hero h1 { font-size: 1.8rem; line-height: 1.2; }
        .hero-desc { font-size: 0.88rem; margin-bottom: 1.8rem; }
        .hero-actions { flex-direction: column; }
        .hero-actions a { width: 100%; justify-content: center; }

        .hero-stats-inner { grid-template-columns: repeat(2, 1fr); }
        .stat-num { font-size: 1.5rem; }
        .stat-label { font-size: 0.65rem; }
        .stat-item { padding: 1rem 0.75rem; }

        .about-features { grid-template-columns: 1fr; }
        .about-image-wrap img { height: 220px; }

        .process-grid { grid-template-columns: 1fr; }

        .service-card { padding: 1.5rem; }
        .testimonial-card { padding: 1.5rem; }

        .cta-card { padding: 2.5rem 1.2rem; }
        .cta-card h2 { font-size: 1.5rem; }
        .cta-card p { font-size: 0.88rem; }
        .cta-actions { flex-direction: column; }
        .cta-actions a { width: 100%; justify-content: center; }

        .portfolio-filter { gap: 0.35rem; }
        .pf-btn { padding: 0.4rem 0.9rem; font-size: 0.78rem; }

        .section-heading { font-size: 1.5rem; }
        .section-desc { font-size: 0.88rem; }
        .section-badge { font-size: 0.7rem; padding: 0.35rem 0.9rem; }
    }
</style>
@endsection

@section('content')

{{-- ===== HERO ===== --}}
<section class="hero">
    <div class="hero-bg"></div>
    <div class="hero-overlay"></div>
    <div class="container">
        <div class="hero-content" data-aos="fade-up">
            <div class="hero-eyebrow">
                <span class="line"></span>
                Jasa Arsitek & Konstruksi Profesional
            </div>
            <h1>Wujudkan Bangunan<br><span class="gold">Impian Anda</span></h1>
            <p class="hero-desc">
                Dari desain konseptual hingga konstruksi final — kami hadir sebagai mitra terpercaya untuk setiap tahap proyek bangunan Anda di Surabaya dan sekitarnya.
            </p>
            <div class="hero-actions">
                <a href="{{ route('kontak') }}" class="btn-gold">
                    <i class="fas fa-comments"></i> Konsultasi Gratis
                </a>
                <a href="{{ route('portofolio') }}" class="btn-outline-white">
                    <i class="fas fa-images"></i> Lihat Portofolio
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Stats bar as standalone section --}}
<div class="hero-stats">
    <div class="hero-stats-inner">
        <div class="stat-item" data-aos="fade-up" data-aos-delay="0">
            <div class="stat-num">35+</div>
            <div class="stat-label">Tahun Pengalaman</div>
        </div>
        <div class="stat-item" data-aos="fade-up" data-aos-delay="100">
            <div class="stat-num">200+</div>
            <div class="stat-label">Proyek Selesai</div>
        </div>
        <div class="stat-item" data-aos="fade-up" data-aos-delay="200">
            <div class="stat-num">98%</div>
            <div class="stat-label">Kepuasan Klien</div>
        </div>
        <div class="stat-item" data-aos="fade-up" data-aos-delay="300">
            <div class="stat-num">50+</div>
            <div class="stat-label">Tim Profesional</div>
        </div>
    </div>
</div>


{{-- ===== ABOUT ===== --}}
<section class="about-strip">
    <div class="container">
        <div class="about-grid">
            <div class="about-image-wrap" data-aos="fade-right">
                <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?w=800&h=600&fit=crop&q=80"
                     alt="Tim BangunImpian sedang bekerja di proyek">
                <div class="about-badge-float">
                    <strong>35+</strong>
                    <span>Tahun Kepercayaan</span>
                </div>
            </div>

            <div data-aos="fade-left">
                <div class="section-badge">Tentang BangunImpian</div>
                <h2 class="section-heading">Membangun Kepercayaan,<br><span class="accent">Satu Proyek Sekaligus</span></h2>
                <p class="section-desc">
                    Sejak berdiri, BangunImpian telah menjadi pilihan utama keluarga dan pelaku bisnis di Surabaya untuk mewujudkan bangunan berkualitas tinggi. Kami percaya bahwa setiap bangunan adalah warisan yang bertahan lintas generasi.
                </p>

                <div class="about-features">
                    <div class="about-feature">
                        <div class="icon"><i class="fas fa-shield-alt"></i></div>
                        <div>
                            <h5>Bergaransi</h5>
                            <p>Garansi struktur & finishing setiap proyek</p>
                        </div>
                    </div>
                    <div class="about-feature">
                        <div class="icon"><i class="fas fa-users"></i></div>
                        <div>
                            <h5>Tim Ahli</h5>
                            <p>Arsitek, insinyur & kontraktor bersertifikat</p>
                        </div>
                    </div>
                    <div class="about-feature">
                        <div class="icon"><i class="fas fa-clock"></i></div>
                        <div>
                            <h5>Tepat Waktu</h5>
                            <p>Komitmen penyelesaian sesuai jadwal</p>
                        </div>
                    </div>
                    <div class="about-feature">
                        <div class="icon"><i class="fas fa-tags"></i></div>
                        <div>
                            <h5>Harga Transparan</h5>
                            <p>RAB detail tanpa biaya tersembunyi</p>
                        </div>
                    </div>
                </div>

                <div style="margin-top: 2.2rem;">
                    <a href="{{ route('tentang') }}" class="btn-outline-dark">
                        <i class="fas fa-arrow-right"></i> Selengkapnya
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== SERVICES ===== --}}
<section class="services-section">
    <div class="container">
        <div class="services-header">
            <div data-aos="fade-right">
                <div class="section-badge dark">Layanan Kami</div>
                <h2 class="section-heading light">Solusi Lengkap<br><span class="accent">Untuk Bangunan Anda</span></h2>
            </div>
            <div data-aos="fade-left">
                <a href="{{ route('layanan') }}" class="btn-gold">Semua Layanan <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>

        <div class="services-grid">
            @php
                $services = [
                    ['icon' => 'fas fa-drafting-compass', 'color' => '#c8a96e', 'title' => 'Desain Arsitektur', 'desc' => 'Desain custom yang menggabungkan estetika dan fungsi. Dari konsep hingga gambar kerja siap bangun dengan render 3D berkualitas tinggi.'],
                    ['icon' => 'fas fa-hard-hat', 'color' => '#e8c98e', 'title' => 'Konstruksi', 'desc' => 'Pelaksanaan pembangunan dengan material premium, pengawasan ketat, dan standar kualitas internasional yang terjamin.'],
                    ['icon' => 'fas fa-couch', 'color' => '#b8943f', 'title' => 'Interior Design', 'desc' => 'Ruang yang fungsional sekaligus merefleksikan kepribadian Anda. Konsep personal dengan material pilihan terbaik.'],
                    ['icon' => 'fas fa-tools', 'color' => '#c8a96e', 'title' => 'Renovasi', 'desc' => 'Transformasi ruang lama menjadi tampilan baru yang segar. Renovasi parsial maupun total dengan minimal gangguan.'],
                    ['icon' => 'fas fa-store', 'color' => '#e8c98e', 'title' => 'Desain Komersial', 'desc' => 'Ruang bisnis yang dirancang untuk meningkatkan penjualan dan menciptakan pengalaman pelanggan yang berkesan.'],
                    ['icon' => 'fas fa-mosque', 'color' => '#b8943f', 'title' => 'Proyek Spesial', 'desc' => 'Masjid, gedung serbaguna, dan bangunan khusus dengan keahlian teknis tinggi dan detail finishing premium.'],
                ];
            @endphp

            @foreach($services as $i => $svc)
            <div class="service-card" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                <div class="service-icon-wrap" style="color: {{ $svc['color'] }}">
                    <i class="{{ $svc['icon'] }}"></i>
                </div>
                <h3>{{ $svc['title'] }}</h3>
                <p>{{ $svc['desc'] }}</p>
                <a href="{{ route('layanan') }}" class="service-link">
                    Pelajari lebih lanjut <i class="fas fa-arrow-right fa-xs"></i>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== PORTFOLIO PREVIEW ===== --}}
<section class="portfolio-section">
    <div class="container">
        <div class="portfolio-header">
            <div data-aos="fade-right">
                <div class="section-badge">Portofolio</div>
                <h2 class="section-heading">Karya-Karya<br><span class="accent">Terbaik Kami</span></h2>
            </div>
            <div data-aos="fade-left">
                <a href="{{ route('portofolio') }}" class="btn-outline-dark">
                    Semua Proyek <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="portfolio-filter" data-aos="fade-up">
            <button class="pf-btn active" onclick="filterPF(this, 'semua')">Semua</button>
            <button class="pf-btn" onclick="filterPF(this, 'rumah')">Rumah</button>
            <button class="pf-btn" onclick="filterPF(this, 'komersial')">Komersial</button>
            <button class="pf-btn" onclick="filterPF(this, 'ibadah')">Tempat Ibadah</button>
            <button class="pf-btn" onclick="filterPF(this, 'lainya')">Lainnya</button>
        </div>

        <div class="portfolio-grid" id="pf-grid">
            @php $portfolios = \App\Models\Portfolio::latest()->take(6)->get(); @endphp
            @forelse($portfolios as $i => $item)
            <div class="portfolio-card pf-item" data-cat="{{ strtolower($item->kategori) }}"
                 data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 100 }}">
                <div class="portfolio-img">
                    @if($item->gambar)
                        <img src="{{ Storage::url($item->gambar) }}" alt="{{ $item->nama_proyek }}" loading="lazy">
                    @else
                        <div class="portfolio-img-placeholder">
                            <i class="fas fa-building"></i>
                        </div>
                    @endif
                    <span class="portfolio-badge badge-{{ strtolower($item->kategori) }}">
                        @php
                            $k = strtolower($item->kategori);
                            if ($k === 'ibadah') echo 'Tempat Ibadah';
                            elseif ($k === 'lainya') echo 'Lainnya';
                            else echo ucfirst($k);
                        @endphp
                    </span>
                </div>
                <div class="portfolio-body">
                    <h4>{{ $item->judul }}</h4>
                    <p>{{ $item->deskripsi }}</p>
                    <div class="portfolio-meta">
                        <span><i class="fas fa-ruler-combined"></i> {{ $item->luas }}</span>
                        <span><i class="fas fa-calendar-alt"></i> {{ $item->tahun }}</span>
                    </div>
                </div>
            </div>
            @empty
            <div style="grid-column: 1/-1; text-align: center; padding: 4rem; color: var(--text-light);">
                <i class="fas fa-images fa-3x" style="margin-bottom:1rem; opacity:0.4"></i>
                <p>Portfolio sedang dipersiapkan. Segera hadir!</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

{{-- ===== PROCESS ===== --}}
<section class="process-section">
    <div class="container" style="text-align:center;">
        <div data-aos="fade-up">
            <div class="section-badge" style="margin: 0 auto 1rem;">Cara Kerja Kami</div>
            <h2 class="section-heading" style="margin: 0 auto 0.75rem;">Proses Sederhana,<br><span class="accent">Hasil Luar Biasa</span></h2>
        </div>

        <div class="process-grid">
            @php
                $steps = [
                    ['num'=>'01','title'=>'Konsultasi','desc'=>'Diskusi kebutuhan, visi, dan anggaran proyek Anda secara gratis bersama tim ahli kami'],
                    ['num'=>'02','title'=>'Desain','desc'=>'Tim arsitek menyusun konsep desain beserta visualisasi 3D dan estimasi RAB yang detail'],
                    ['num'=>'03','title'=>'Konstruksi','desc'=>'Pelaksanaan pembangunan dengan pengawasan ketat dan laporan progress berkala'],
                    ['num'=>'04','title'=>'Selesai','desc'=>'Serah terima proyek dengan inspeksi final dan garansi purna jual terjamin'],
                ];
            @endphp
            @foreach($steps as $i => $step)
            <div class="process-step" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="process-num">{{ $step['num'] }}</div>
                <h4>{{ $step['title'] }}</h4>
                <p>{{ $step['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== TESTIMONIALS ===== --}}
<section class="testimonial-section">
    <div class="container">
        <div style="text-align:center;" data-aos="fade-up">
            <div class="section-badge dark" style="margin: 0 auto 1rem;">Testimoni</div>
            <h2 class="section-heading light" style="margin: 0 auto 0.5rem;">Kata Mereka <span class="accent">Tentang Kami</span></h2>
            <p class="section-desc light" style="margin: 0 auto;">Kepercayaan klien adalah motivasi terbesar kami untuk terus berkarya</p>
        </div>

        <div class="testimonial-grid">
            @php
                $testimonials = [
                    ['name'=>'Bapak Hendra S.', 'role'=>'Pemilik Rumah – Surabaya Barat', 'quote'=>'Sangat puas dengan hasil kerja BangunImpian. Desain rumah kami persis seperti yang diinginkan, bahkan lebih baik. Tim-nya ramah, profesional, dan tepat waktu!', 'init'=>'H'],
                    ['name'=>'Ibu Rahayu W.', 'role'=>'Pemilik Kafe – Surabaya Pusat', 'quote'=>'Renovasi café kami selesai jauh melebihi ekspektasi. Detail finishing sangat rapi dan desain interiornya membuat pelanggan betah berlama-lama.', 'init'=>'R'],
                    ['name'=>'Takmir Masjid Darussalam', 'role'=>'Proyek Masjid – Surabaya Utara', 'quote'=>'Alhamdulillah, pembangunan masjid kami berjalan lancar. BangunImpian sangat amanah dan kualitas bangunannya kokoh dan megah. Sangat direkomendasikan!', 'init'=>'M'],
                ];
            @endphp
            @foreach($testimonials as $i => $t)
            <div class="testimonial-card" data-aos="fade-up" data-aos-delay="{{ $i * 120 }}">
                <div class="testimonial-stars">★★★★★</div>
                <blockquote>"{{ $t['quote'] }}"</blockquote>
                <div class="testimonial-author">
                    <div class="testimonial-avatar">{{ $t['init'] }}</div>
                    <div class="testimonial-info">
                        <strong>{{ $t['name'] }}</strong>
                        <span>{{ $t['role'] }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== CTA ===== --}}
<section class="cta-section">
    <div class="container">
        <div class="cta-card" data-aos="zoom-in">
            <h2>Siap Mulai Proyek<br><span>Impian Anda?</span></h2>
            <p>Konsultasikan kebutuhan Anda sekarang. Tim kami siap memberikan solusi terbaik dengan estimasi biaya gratis.</p>
            <div class="cta-actions">
                <a href="{{ route('kontak') }}" class="btn-gold">
                    <i class="fas fa-phone-alt"></i> Hubungi Sekarang
                </a>
                <a href="https://wa.me/6281331135822?text=Halo%20BangunImpian%2C%20saya%20ingin%20konsultasi%20gratis%20mengenai%20proyek%20bangunan%20saya."
                   target="_blank" class="btn-outline-white">
                    <i class="fab fa-whatsapp"></i> WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

@section('extra-js')
<script>
    // Portfolio filter
    function filterPF(btn, cat) {
        document.querySelectorAll('.pf-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        document.querySelectorAll('.pf-item').forEach(item => {
            if (cat === 'semua' || item.dataset.cat === cat) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
    }

    // Counter animation
    const counters = document.querySelectorAll('.stat-num');
    const animateCounter = (el) => {
        const target = parseFloat(el.textContent);
        const suffix = el.textContent.replace(/[\d.]/g, '');
        let current = 0;
        const duration = 1800;
        const step = target / (duration / 16);
        const timer = setInterval(() => {
            current = Math.min(current + step, target);
            el.textContent = (Number.isInteger(target) ? Math.floor(current) : current.toFixed(0)) + suffix;
            if (current >= target) clearInterval(timer);
        }, 16);
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(c => observer.observe(c));
</script>
@endsection
