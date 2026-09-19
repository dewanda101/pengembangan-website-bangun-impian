@extends('layouts.app')

@section('title', 'Tentang BangunImpian – Mitra Konstruksi Terpercaya Sejak 35 Tahun')

@section('extra-css')
<style>
    /* ===== PAGE HERO ===== */
    .page-hero {
        min-height: 420px;
        background: linear-gradient(105deg, rgba(10,20,38,0.93) 0%, rgba(14,27,46,0.80) 60%, rgba(14,27,46,0.60) 100%),
                    url('https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=1400&h=500&fit=crop&q=80') center/cover no-repeat;
        display: flex;
        align-items: center;
        padding: 8rem 0 5rem;
    }

    .breadcrumb-custom {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 1.2rem;
        font-size: 0.82rem;
        color: rgba(255,255,255,0.5);
    }
    .breadcrumb-custom a { color: var(--accent); text-decoration: none; }
    .breadcrumb-custom a:hover { color: var(--accent-lt); }

    .page-hero h1 {
        font-family: 'Playfair Display', serif;
        font-size: clamp(2.2rem, 5vw, 3.5rem);
        font-weight: 700;
        color: white;
        line-height: 1.2;
        margin-bottom: 1rem;
    }
    .page-hero h1 span { color: var(--accent); }
    .page-hero p {
        font-size: 1.05rem;
        color: rgba(255,255,255,0.72);
        max-width: 520px;
        line-height: 1.7;
    }

    /* ===== ABOUT STORY ===== */
    .about-story {
        padding: 7rem 0;
        background: #f8f6f2;
    }

    .story-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 5rem;
        align-items: center;
    }

    .story-img-wrap {
        position: relative;
    }

    .story-img-wrap img {
        width: 100%;
        height: 480px;
        object-fit: cover;
        border-radius: 20px;
        box-shadow: 0 30px 70px rgba(0,0,0,0.15);
        display: block;
    }

    .story-img-badge {
        position: absolute;
        bottom: -1.5rem;
        right: -1.5rem;
        background: var(--primary);
        border: 1px solid rgba(200,169,110,0.25);
        border-radius: 16px;
        padding: 1.5rem 2rem;
        text-align: center;
        box-shadow: 0 16px 40px rgba(0,0,0,0.25);
    }

    .story-img-badge strong {
        font-family: 'Playfair Display', serif;
        font-size: 2.8rem;
        color: var(--accent);
        display: block;
        line-height: 1;
    }

    .story-img-badge span {
        font-size: 0.75rem;
        color: rgba(255,255,255,0.6);
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .story-text .section-badge { margin-bottom: 1rem; }

    .story-text p {
        font-size: 1rem;
        color: #555;
        line-height: 1.8;
        margin-bottom: 1.2rem;
    }

    .story-checklist {
        list-style: none;
        padding: 0;
        margin: 1.8rem 0;
    }

    .story-checklist li {
        display: flex;
        align-items: center;
        gap: 0.85rem;
        padding: 0.65rem 0;
        border-bottom: 1px solid rgba(0,0,0,0.06);
        font-size: 0.95rem;
        color: #444;
        font-weight: 500;
    }

    .story-checklist li:last-child { border-bottom: none; }

    .story-checklist .ck-icon {
        width: 28px;
        height: 28px;
        min-width: 28px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--accent), var(--gold));
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary);
        font-size: 0.7rem;
    }

    /* ===== STATS GRID ===== */
    .stats-band {
        background: var(--primary);
        padding: 0;
    }

    .stats-band-inner {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
    }

    .sb-item {
        padding: 3rem 2rem;
        border-right: 1px solid rgba(255,255,255,0.08);
        text-align: center;
        position: relative;
        transition: background 0.3s;
    }

    .sb-item:last-child { border-right: none; }
    .sb-item:hover { background: rgba(200,169,110,0.07); }

    .sb-icon {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        background: rgba(200,169,110,0.15);
        border: 1px solid rgba(200,169,110,0.25);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--accent);
        font-size: 1.3rem;
        margin: 0 auto 1rem;
    }

    .sb-num {
        font-family: 'Playfair Display', serif;
        font-size: 2.6rem;
        font-weight: 700;
        color: var(--accent);
        line-height: 1;
        margin-bottom: 0.3rem;
    }

    .sb-label {
        font-size: 0.82rem;
        color: rgba(255,255,255,0.55);
        letter-spacing: 0.06em;
        text-transform: uppercase;
        font-weight: 600;
    }

    /* ===== NILAI INTI ===== */
    .nilai-section {
        padding: 7rem 0;
        background: white;
    }

    .nilai-section .section-center {
        text-align: center;
        margin-bottom: 4rem;
    }

    .nilai-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
    }

    .nilai-card {
        background: #f8f6f2;
        border-radius: 20px;
        padding: 2.5rem 2rem;
        border: 1px solid rgba(0,0,0,0.06);
        transition: all 0.35s ease;
        position: relative;
        overflow: hidden;
    }

    .nilai-card::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--accent), var(--gold));
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.35s ease;
        border-radius: 0 0 20px 20px;
    }

    .nilai-card:hover {
        background: white;
        transform: translateY(-6px);
        box-shadow: 0 20px 50px rgba(0,0,0,0.1);
        border-color: rgba(200,169,110,0.25);
    }

    .nilai-card:hover::after { transform: scaleX(1); }

    .nilai-icon-wrap {
        width: 72px;
        height: 72px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.7rem;
        margin-bottom: 1.5rem;
        position: relative;
        transition: transform 0.3s;
    }

    .nilai-card:hover .nilai-icon-wrap { transform: scale(1.08) rotate(-4deg); }

    .nilai-card h4 {
        font-family: 'Playfair Display', serif;
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 0.75rem;
    }

    .nilai-card p {
        font-size: 0.88rem;
        color: #777;
        line-height: 1.7;
    }


    /* ===== CTA ===== */
    .tentang-cta {
        background: var(--primary);
        padding: 6rem 0;
        text-align: center;
    }

    .tentang-cta h2 {
        font-family: 'Playfair Display', serif;
        font-size: clamp(1.8rem, 3vw, 2.6rem);
        font-weight: 700;
        color: white;
        margin-bottom: 1rem;
    }

    .tentang-cta h2 span { color: var(--accent); }

    .tentang-cta p {
        color: rgba(255,255,255,0.65);
        max-width: 480px;
        margin: 0 auto 2.2rem;
        font-size: 0.95rem;
    }

    .tentang-cta-btns {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 1024px) {
        .stats-band-inner { grid-template-columns: repeat(2, 1fr); }
        .sb-item:nth-child(2) { border-right: none; }
        .sb-item:nth-child(3) { border-top: 1px solid rgba(255,255,255,0.08); }
    }

    @media (max-width: 768px) {
        .story-grid { grid-template-columns: 1fr; gap: 3rem; }
        .story-img-wrap img { height: 280px; }
        .story-img-badge { position: static; margin-top: 1rem; display: inline-block; }
        .nilai-grid { grid-template-columns: 1fr 1fr; }
        .page-hero { padding: 7rem 0 4rem; }

        .about-story, .nilai-section, .team-section, .tentang-cta { padding: 4rem 0; }
    }

    @media (max-width: 480px) {
        .nilai-grid { grid-template-columns: 1fr; }
        .team-grid { grid-template-columns: 1fr 1fr; }
        .stats-band-inner { grid-template-columns: repeat(2, 1fr); }
        .sb-item { padding: 2rem 1rem; }
        .tentang-cta-btns { flex-direction: column; align-items: center; }
        .tentang-cta-btns a { width: 100%; max-width: 280px; justify-content: center; }
    }
</style>
@endsection

@section('content')

{{-- ===== PAGE HERO ===== --}}
<section class="page-hero">
    <div class="container">
        <div data-aos="fade-up">
            <div class="breadcrumb-custom">
                <a href="{{ route('home') }}">Beranda</a>
                <i class="fas fa-chevron-right fa-xs"></i>
                <span>Tentang Kami</span>
            </div>
            <h1>Tentang <span>BangunImpian</span></h1>
            <p>Mitra terpercaya yang telah mendampingi ratusan keluarga dan pelaku bisnis mewujudkan bangunan impian selama 35 tahun.</p>
        </div>
    </div>
</section>

{{-- ===== ABOUT STORY ===== --}}
<section class="about-story">
    <div class="container">
        <div class="story-grid">
            <div class="story-img-wrap" data-aos="fade-right">
                @if(file_exists(public_path('images/kontruksi baru.jpg')))
                    <img src="{{ asset('images/kontruksi baru.jpg') }}" alt="Tim BangunImpian">
                @else
                    <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?w=800&h=600&fit=crop&q=80" alt="Tim BangunImpian bekerja">
                @endif
                <div class="story-img-badge">
                    <strong>35+</strong>
                    <span>Tahun Pengalaman</span>
                </div>
            </div>

            <div data-aos="fade-left">
                <div class="section-badge">Kisah Kami</div>
                <h2 class="section-heading">Membangun Lebih dari<br><span class="accent">Sekadar Bangunan</span></h2>
                <p>Sejak berdiri, BangunImpian telah menjadi pilihan utama untuk membangun rumah, masjid, kafe, dan gedung komersial di Surabaya. Dengan pengalaman lebih dari 35 tahun, kami memahami setiap detail kebutuhan Anda.</p>
                <p>Tim profesional kami yang berpengalaman siap memberikan solusi konstruksi terbaik — dari desain awal, perencanaan anggaran, hingga serah terima kunci.</p>

                <ul class="story-checklist">
                    <li>
                        <div class="ck-icon"><i class="fas fa-check fa-xs"></i></div>
                        Arsitek & insinyur bersertifikat nasional
                    </li>
                    <li>
                        <div class="ck-icon"><i class="fas fa-check fa-xs"></i></div>
                        Material pilihan berstandar SNI & internasional
                    </li>
                    <li>
                        <div class="ck-icon"><i class="fas fa-check fa-xs"></i></div>
                        Garansi struktur & finishing setiap proyek
                    </li>
                    <li>
                        <div class="ck-icon"><i class="fas fa-check fa-xs"></i></div>
                        Laporan progress mingguan untuk klien
                    </li>
                    <li>
                        <div class="ck-icon"><i class="fas fa-check fa-xs"></i></div>
                        Konsultasi & estimasi biaya gratis
                    </li>
                </ul>

                <a href="{{ route('kontak') }}" class="btn-gold">
                    <i class="fas fa-phone-alt"></i> Konsultasi Gratis
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ===== STATS BAND ===== --}}
<div class="stats-band">
    <div class="container" style="padding: 0; max-width: 100%;">
        <div class="stats-band-inner" style="max-width:1200px; margin:0 auto; padding:0 2rem;">
            <div class="sb-item" data-aos="fade-up" data-aos-delay="0">
                <div class="sb-icon"><i class="fas fa-project-diagram"></i></div>
                <div class="sb-num">300+</div>
                <div class="sb-label">Proyek Selesai</div>
            </div>
            <div class="sb-item" data-aos="fade-up" data-aos-delay="100">
                <div class="sb-icon"><i class="fas fa-history"></i></div>
                <div class="sb-num">35+</div>
                <div class="sb-label">Tahun Pengalaman</div>
            </div>
            <div class="sb-item" data-aos="fade-up" data-aos-delay="200">
                <div class="sb-icon"><i class="fas fa-star"></i></div>
                <div class="sb-num">98%</div>
                <div class="sb-label">Kepuasan Klien</div>
            </div>
            <div class="sb-item" data-aos="fade-up" data-aos-delay="300">
                <div class="sb-icon"><i class="fas fa-headset"></i></div>
                <div class="sb-num">24/7</div>
                <div class="sb-label">Dukungan Pelanggan</div>
            </div>
        </div>
    </div>
</div>

{{-- ===== NILAI INTI ===== --}}
<section class="nilai-section">
    <div class="container">
        <div class="section-center" data-aos="fade-up">
            <div class="section-badge" style="margin: 0 auto 1rem;">Filosofi Kami</div>
            <h2 class="section-heading" style="margin: 0 auto 0.75rem;">Nilai-Nilai <span class="accent">Inti Kami</span></h2>
            <p class="section-desc" style="margin: 0 auto;">Prinsip yang mendasari setiap keputusan dan karya kami dalam melayani Anda</p>
        </div>

        <div class="nilai-grid">
            {{-- Profesional --}}
            <div class="nilai-card" data-aos="fade-up" data-aos-delay="0">
                <div class="nilai-icon-wrap" style="background: linear-gradient(135deg, rgba(14,27,46,0.08) 0%, rgba(14,27,46,0.15) 100%); border: 1.5px solid rgba(14,27,46,0.12);">
                    <i class="fas fa-medal" style="color: var(--primary);"></i>
                </div>
                <h4>Profesional</h4>
                <p>Tim ahli bersertifikat kami bekerja dengan standar kualitas tertinggi di setiap tahapan proyek — dari perencanaan hingga penyelesaian akhir.</p>
            </div>

            {{-- Inovasi --}}
            <div class="nilai-card" data-aos="fade-up" data-aos-delay="100">
                <div class="nilai-icon-wrap" style="background: linear-gradient(135deg, rgba(200,169,110,0.12) 0%, rgba(184,148,63,0.18) 100%); border: 1.5px solid rgba(200,169,110,0.25);">
                    <i class="fas fa-lightbulb" style="color: var(--gold);"></i>
                </div>
                <h4>Inovasi</h4>
                <p>Kami selalu mengadopsi teknologi dan tren desain konstruksi terkini untuk menghadirkan solusi bangunan yang modern dan efisien.</p>
            </div>

            {{-- Kepercayaan --}}
            <div class="nilai-card" data-aos="fade-up" data-aos-delay="200">
                <div class="nilai-icon-wrap" style="background: linear-gradient(135deg, rgba(39,174,96,0.1) 0%, rgba(39,174,96,0.18) 100%); border: 1.5px solid rgba(39,174,96,0.2);">
                    <i class="fas fa-handshake" style="color: #27ae60;"></i>
                </div>
                <h4>Kepercayaan</h4>
                <p>Transparansi dan kejujuran adalah fondasi hubungan kami dengan klien. Kepuasan Anda adalah tolak ukur keberhasilan setiap proyek kami.</p>
            </div>

            {{-- Kualitas --}}
            <div class="nilai-card" data-aos="fade-up" data-aos-delay="0">
                <div class="nilai-icon-wrap" style="background: linear-gradient(135deg, rgba(52,152,219,0.1) 0%, rgba(52,152,219,0.18) 100%); border: 1.5px solid rgba(52,152,219,0.2);">
                    <i class="fas fa-gem" style="color: #3498db;"></i>
                </div>
                <h4>Kualitas Premium</h4>
                <p>Material terbaik, teknik terkini, dan pengawasan ketat memastikan setiap bangunan yang kami bangun bertahan kuat melewati ujian waktu.</p>
            </div>

            {{-- Tepat Waktu --}}
            <div class="nilai-card" data-aos="fade-up" data-aos-delay="100">
                <div class="nilai-icon-wrap" style="background: linear-gradient(135deg, rgba(231,76,60,0.1) 0%, rgba(231,76,60,0.18) 100%); border: 1.5px solid rgba(231,76,60,0.2);">
                    <i class="fas fa-clock" style="color: #e74c3c;"></i>
                </div>
                <h4>Tepat Waktu</h4>
                <p>Kami berkomitmen menyelesaikan proyek sesuai jadwal yang disepakati, dengan manajemen waktu yang terstruktur dan disiplin tinggi.</p>
            </div>

            {{-- Ramah Lingkungan --}}
            <div class="nilai-card" data-aos="fade-up" data-aos-delay="200">
                <div class="nilai-icon-wrap" style="background: linear-gradient(135deg, rgba(155,89,182,0.1) 0%, rgba(155,89,182,0.18) 100%); border: 1.5px solid rgba(155,89,182,0.2);">
                    <i class="fas fa-leaf" style="color: #9b59b6;"></i>
                </div>
                <h4>Ramah Lingkungan</h4>
                <p>Kami mengedepankan praktik konstruksi berkelanjutan dengan material eco-friendly dan desain yang hemat energi untuk masa depan yang lebih baik.</p>
            </div>
        </div>
    </div>
</section>


{{-- ===== CTA ===== --}}
<section class="tentang-cta">
    <div class="container">
        <div data-aos="zoom-in">
            <div class="section-badge dark" style="margin: 0 auto 1.2rem;">Mulai Bersama Kami</div>
            <h2>Siap Wujudkan Proyek<br><span>Bangunan Anda?</span></h2>
            <p>Konsultasikan kebutuhan Anda dengan tim ahli kami sekarang. Estimasi biaya gratis, tanpa komitmen.</p>
            <div class="tentang-cta-btns">
                <a href="{{ route('kontak') }}" class="btn-gold">
                    <i class="fas fa-envelope"></i> Hubungi Kami
                </a>
                <a href="{{ route('portofolio') }}" class="btn-outline-white">
                    <i class="fas fa-images"></i> Lihat Portofolio
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
