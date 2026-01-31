@extends('layouts.app')

@section('title', 'BangunImpian - Solusi Konstruksi dan Desain Terpercaya')

@section('content')
    <!-- HERO SECTION -->
    <section class="hero-section">
        <div class="hero-content">
            <h1>Bangun Rumah Impian Anda</h1>
            <p>Solusi lengkap untuk konstruksi, desain, dan renovasi dengan standar kualitas terbaik</p>
            <div class="hero-buttons">
                <a href="{{ route('layanan') }}" class="btn-primary-custom">
                    <i class="fas fa-arrow-right"></i> Jelajahi Layanan
                </a>
                <a href="{{ route('kontak') }}" class="btn-secondary-custom">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>

    <!-- HIGHLIGHT FEATURES -->
    <section style="background: var(--light); padding: 5rem 0;">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div style="text-align: center;">
                            <div style="width:88px; height:88px; margin:0 auto 1rem; border-radius:50%; display:flex; align-items:center; justify-content:center; background:linear-gradient(135deg,var(--accent),#d35400); color:white; font-size:1.6rem; box-shadow:0 8px 20px rgba(0,0,0,0.12);">
                                <span aria-hidden="true">🛡️</span>
                            </div>
                            <h5 style="color: var(--primary); font-weight: 700; margin-bottom: 0.5rem;">Terpercaya</h5>
                            <p style="color: #666;">35+ tahun melayani dengan dedikasi tinggi</p>
                        </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div style="text-align: center;">
                        <div style="width:88px; height:88px; margin:0 auto 1rem; border-radius:50%; display:flex; align-items:center; justify-content:center; background:linear-gradient(135deg,var(--primary),#1e4556); color:white; font-size:1.6rem; box-shadow:0 8px 20px rgba(0,0,0,0.12);">
                            <span aria-hidden="true">👷</span>
                        </div>
                        <h5 style="color: var(--primary); font-weight: 700; margin-bottom: 0.5rem;">Profesional</h5>
                        <p style="color: #666;">Tim ahli berpengalaman dan berstandar</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div style="text-align: center;">
                        <div style="width:88px; height:88px; margin:0 auto 1rem; border-radius:50%; display:flex; align-items:center; justify-content:center; background:linear-gradient(135deg,#27ae60,#229954); color:white; font-size:1.6rem; box-shadow:0 8px 20px rgba(0,0,0,0.12);">
                            <span aria-hidden="true">💰</span>
                        </div>
                        <h5 style="color: var(--primary); font-weight: 700; margin-bottom: 0.5rem;">Kompetitif</h5>
                        <p style="color: #666;">Harga terbaik dengan kualitas premium</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div style="text-align: center;">
                        <div style="width:88px; height:88px; margin:0 auto 1rem; border-radius:50%; display:flex; align-items:center; justify-content:center; background:linear-gradient(135deg,#3498db,#2980b9); color:white; font-size:1.6rem; box-shadow:0 8px 20px rgba(0,0,0,0.12);">
                            <span aria-hidden="true">⚡</span>
                        </div>
                        <h5 style="color: var(--primary); font-weight: 700; margin-bottom: 0.5rem;">Responsif</h5>
                        <p style="color: #666;">Dukungan 24/7 untuk kepuasan Anda</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CALL TO ACTION -->
    <section style="background: linear-gradient(135deg, var(--primary) 0%, #1e4556 100%); color: white; padding: 4rem 0; text-align: center;">
        <div class="container">
            <h2 style="font-size: 2.5rem; font-weight: 800; margin-bottom: 1.5rem;">Siap Mewujudkan Impian Bangunan Anda?</h2>
            <p style="font-size: 1.1rem; margin-bottom: 2rem; opacity: 0.9;">Jangan tunggu lagi! Hubungi kami hari ini untuk konsultasi gratis</p>
            <div>
                <a href="{{ route('kontak') }}" class="btn btn-light btn-lg" style="font-weight: 600; margin: 0 0.5rem;">Hubungi Sekarang</a>
                <a href="{{ route('layanan') }}" class="btn btn-outline-light btn-lg" style="font-weight: 600; margin: 0 0.5rem;">Lihat Layanan</a>
            </div>
        </div>
    </section>
@endsection
