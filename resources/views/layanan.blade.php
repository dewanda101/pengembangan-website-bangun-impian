@extends('layouts.app')

@section('title', 'Layanan BangunImpian - Solusi Konstruksi Lengkap')

@section('content')
    <!-- LAYANAN HERO -->
    <section class="layanan-hero">
        <div class="container py-5">
            <h1 class="section-title mb-4">Layanan Kami</h1>
            <p class="section-subtitle mb-5">Solusi Lengkap Untuk Semua Kebutuhan Konstruksi dan Desain Anda</p>
        </div>
    </section>

    <!-- LAYANAN CONTENT -->
    <section class="layanan-section py-5">
        <div class="container">
            <div class="row g-4">
                @forelse(\App\Models\Layanan::all() as $layanan)
                    <div class="col-md-6 col-lg-4">
                        <div class="service-card" style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); transition: all 0.3s ease; cursor: pointer;" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 8px 25px rgba(0, 0, 0, 0.15)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(0, 0, 0, 0.1)'">
                            <div class="card-header" style="background: {{ $layanan->icon_color }}; padding: 3rem; text-align: center; color: white;">
                                <div style="width:64px; height:64px; margin:0 auto 1rem; display:flex; align-items:center; justify-content:center;">
                                    <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img">
                                        @php
                                            // Choose different icon SVG based on service title
                                            $iconNum = ($loop->index % 6) + 1;
                                        @endphp
                                        @if($iconNum == 1)
                                            <!-- Desain Arsitektur Icon -->
                                            <defs>
                                                <linearGradient id="g{{ $loop->index }}" x1="0" x2="1" y1="0" y2="1">
                                                    <stop offset="0" stop-color="#ffffff" stop-opacity="0.95"/>
                                                    <stop offset="1" stop-color="#ffffff" stop-opacity="0.75"/>
                                                </linearGradient>
                                            </defs>
                                            <rect x="4" y="4" width="56" height="56" rx="10" fill="none" />
                                            <circle cx="32" cy="20" r="9" stroke="rgba(255,255,255,0.95)" stroke-width="2" fill="none" />
                                            <path d="M32 29 L22 52" stroke="rgba(255,255,255,0.95)" stroke-width="2.6" stroke-linecap="round" />
                                            <path d="M32 29 L42 52" stroke="rgba(255,255,255,0.95)" stroke-width="2.6" stroke-linecap="round" />
                                            <circle cx="32" cy="20" r="2.4" fill="rgba(255,255,255,0.95)" />
                                            <rect x="18" y="50" width="6" height="4" rx="1.2" fill="rgba(255,255,255,0.95)" />
                                            <rect x="40" y="50" width="6" height="4" rx="1.2" fill="rgba(255,255,255,0.95)" />
                                        @elseif($iconNum == 2)
                                            <!-- Konstruksi Icon -->
                                            <path d="M10 54h44" stroke="rgba(255,255,255,0.95)" stroke-width="3" stroke-linecap="round" />
                                            <rect x="16" y="30" width="6" height="18" rx="1" fill="rgba(255,255,255,0.95)" />
                                            <rect x="30" y="22" width="6" height="26" rx="1" fill="rgba(255,255,255,0.95)" />
                                            <rect x="44" y="26" width="4" height="22" rx="1" fill="rgba(255,255,255,0.95)" />
                                            <path d="M18 30 L44 18 L50 22" stroke="rgba(255,255,255,0.95)" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" />
                                        @elseif($iconNum == 3)
                                            <!-- Interior Design Icon -->
                                            <path d="M46 22a10 10 0 1 0-20 6c0 3.3 2.7 6 6 6 2.2 0 4.2-1.2 5.5-3 0 0 6.8-0.8 8.5-2.5A4 4 0 0 0 46 22z" stroke="rgba(255,255,255,0.95)" stroke-width="2" stroke-linejoin="round" fill="none" />
                                            <circle cx="34" cy="24" r="2" fill="rgba(255,255,255,0.95)" />
                                            <circle cx="40" cy="30" r="2" fill="rgba(255,255,255,0.95)" />
                                            <path d="M22 44c6-2 10-6 12-10" stroke="rgba(255,255,255,0.95)" stroke-width="2.4" stroke-linecap="round" />
                                        @elseif($iconNum == 4)
                                            <!-- Renovasi Icon -->
                                            <path d="M18 44 L28 34" stroke="rgba(255,255,255,0.95)" stroke-width="3" stroke-linecap="round" />
                                            <path d="M22 40 L32 50" stroke="rgba(255,255,255,0.95)" stroke-width="3" stroke-linecap="round" />
                                            <rect x="34" y="20" width="18" height="10" rx="2" transform="rotate(25 34 20)" fill="rgba(255,255,255,0.95)" />
                                            <path d="M44 20 L52 28" stroke="rgba(255,255,255,0.95)" stroke-width="2" stroke-linecap="round" />
                                        @elseif($iconNum == 5)
                                            <!-- Desain Komersial Icon -->
                                            <rect x="16" y="18" width="12" height="30" rx="1.6" stroke="rgba(255,255,255,0.95)" stroke-width="2" fill="none" />
                                            <rect x="30" y="12" width="18" height="36" rx="1.6" stroke="rgba(255,255,255,0.95)" stroke-width="2" fill="none" />
                                            <path d="M14 50h36" stroke="rgba(255,255,255,0.95)" stroke-width="2.6" stroke-linecap="round" />
                                            <circle cx="36" cy="22" r="1.6" fill="rgba(255,255,255,0.95)" />
                                            <circle cx="36" cy="30" r="1.6" fill="rgba(255,255,255,0.95)" />
                                        @else
                                            <!-- Proyek Spesial Icon -->
                                            <path d="M32 18c8 0 12 6 12 6s-4 6-12 6-12-6-12-6 4-6 12-6z" stroke="rgba(255,255,255,0.95)" stroke-width="2.2" fill="none" />
                                            <path d="M20 34v10h24V34" stroke="rgba(255,255,255,0.95)" stroke-width="2.4" stroke-linecap="round" fill="none" />
                                            <rect x="30" y="8" width="4" height="8" rx="1" fill="rgba(255,255,255,0.95)" />
                                        @endif
                                    </svg>
                                </div>
                                <h4 style="font-weight: 700;">{{ $layanan->judul }}</h4>
                            </div>
                            <div class="card-content" style="padding: 2rem;">
                                <p style="color: #666; line-height: 1.8;">{{ $layanan->deskripsi }}</p>
                                <ul style="color: #666; margin-top: 1.5rem; padding-left: 1.5rem;">
                                    <li>{{ $layanan->fitur_1 }}</li>
                                    <li>{{ $layanan->fitur_2 }}</li>
                                    <li>{{ $layanan->fitur_3 }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12" style="text-align: center; padding: 3rem;">
                        <p style="color: #666; font-size: 1.1rem;">Layanan sedang dimuat. Kembali lagi nanti!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- PROSES KERJA -->
    <section style="background: var(--light); padding: 5rem 0;">
        <div class="container">
            <h2 class="section-title mb-5">Proses Kerja Kami</h2>
            <div class="row g-4">
                <div class="col-md-3">
                    <div style="text-align: center;">
                        <div style="width: 80px; height: 80px; background: var(--primary); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2.5rem; margin: 0 auto 1.5rem; font-weight: 700;">1</div>
                        <h5 style="color: var(--primary); font-weight: 700; margin-bottom: 1rem;">Konsultasi</h5>
                        <p style="color: #666;">Diskusi mendalam tentang kebutuhan, budget, dan visi proyek Anda.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div style="text-align: center;">
                        <div style="width: 80px; height: 80px; background: var(--accent); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2.5rem; margin: 0 auto 1.5rem; font-weight: 700;">2</div>
                        <h5 style="color: var(--primary); font-weight: 700; margin-bottom: 1rem;">Desain</h5>
                        <p style="color: #666;">Pembuatan desain detail dengan render 3D untuk persetujuan Anda.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div style="text-align: center;">
                        <div style="width: 80px; height: 80px; background: #27ae60; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2.5rem; margin: 0 auto 1.5rem; font-weight: 700;">3</div>
                        <h5 style="color: var(--primary); font-weight: 700; margin-bottom: 1rem;">Eksekusi</h5>
                        <p style="color: #666;">Pelaksanaan proyek dengan supervisi ketat dan laporan berkala.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div style="text-align: center;">
                        <div style="width: 80px; height: 80px; background: #3498db; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2.5rem; margin: 0 auto 1.5rem; font-weight: 700;">4</div>
                        <h5 style="color: var(--primary); font-weight: 700; margin-bottom: 1rem;">Serah Terima</h5>
                        <p style="color: #666;">Handover final dengan garansi dan panduan perawatan lengkap.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .layanan-hero {
            background: linear-gradient(135deg, var(--primary) 0%, #1e4556 100%);
            color: white;
            text-align: center;
        }

        .layanan-hero .section-title {
            color: white;
            font-size: 3rem;
            font-weight: 800;
        }

        .layanan-hero .section-subtitle {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.3rem;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary);
            text-align: center;
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: #666;
            text-align: center;
        }
        /* Equal-height service cards */
        .layanan-section .row > [class*="col-"] {
            display: flex;
        }

        .layanan-section .service-card {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .layanan-section .card-header {
            /* keep header size consistent */
            flex: 0 0 auto;
        }

        .layanan-section .card-content {
            flex: 1 1 auto;
        }
    </style>
@endsection
