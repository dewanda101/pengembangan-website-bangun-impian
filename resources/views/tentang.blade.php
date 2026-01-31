@extends('layouts.app')

@section('title', 'Tentang BangunImpian - Mitra Konstruksi Terpercaya Sejak 35 Tahun')

@section('content')
    <!-- TENTANG SECTION -->
    <section class="tentang-hero">
        <div class="container py-5">
            <h1 class="section-title mb-4">Tentang Bangunan Kontruksi </h1>
            <p class="section-subtitle mb-5">Mitra Terpercaya Dalam Mewujudkan Impian Bangunan Anda</p>
        </div>
    </section>

    <!-- ABOUT CONTENT -->
    <section class="about-section py-5">
        <div class="container">
            <div class="row align-items-center g-5 mb-5">
                <div class="col-lg-6">
                    <div>
                        <h2 style="color: var(--primary); font-weight: 700; margin-bottom: 2rem;">Mitra Terpercaya Sejak 35 Tahun Lalu</h2>
                        <p style="color: #666; font-size: 1.1rem; line-height: 1.8; margin-bottom: 1.5rem;">
                            BangunImpian telah menjadi pilihan utama untuk membangun rumah, masjid, café, dan swalayan impian Anda. Dengan pengalaman lebih dari 35 tahun, kami memahami setiap detail kebutuhan Anda dengan sempurna.
                        </p>
                        <p style="color: #666; font-size: 1.1rem; line-height: 1.8;">
                            Tim profesional kami yang berpengalaman siap memberikan solusi konstruksi terbaik dengan harga kompetitif, material berkualitas tinggi, dan hasil yang memuaskan.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('images/kontruksi baru.jpg') }}" alt="Tentang BangunImpian" style="width: 100%; border-radius: 15px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);">
                </div>
            </div>

            <!-- STATS -->
            <div class="row g-4 mt-5">
                <div class="col-md-6 col-lg-3">
                    <div style="background: var(--light); padding: 2.5rem; border-radius: 12px; text-align: center; border-left: 5px solid var(--accent);">
                        <div style="font-size: 2.5rem; font-weight: 800; color: var(--accent); margin-bottom: 0.5rem;">300+</div>
                        <div style="color: var(--primary); font-weight: 600; font-size: 1.1rem;">Proyek Selesai</div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div style="background: var(--light); padding: 2.5rem; border-radius: 12px; text-align: center; border-left: 5px solid var(--primary);">
                        <div style="font-size: 2.5rem; font-weight: 800; color: var(--primary); margin-bottom: 0.5rem;">35+</div>
                        <div style="color: var(--primary); font-weight: 600; font-size: 1.1rem;">Tahun Pengalaman</div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div style="background: var(--light); padding: 2.5rem; border-radius: 12px; text-align: center; border-left: 5px solid #27ae60;">
                        <div style="font-size: 2.5rem; font-weight: 800; color: #27ae60; margin-bottom: 0.5rem;">98%</div>
                        <div style="color: var(--primary); font-weight: 600; font-size: 1.1rem;">Kepuasan Klien</div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div style="background: var(--light); padding: 2.5rem; border-radius: 12px; text-align: center; border-left: 5px solid #3498db;">
                        <div style="font-size: 2.5rem; font-weight: 800; color: #3498db; margin-bottom: 0.5rem;">24/7</div>
                        <div style="color: var(--primary); font-weight: 600; font-size: 1.1rem;">Dukungan Pelanggan</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NILAI INTI -->
    <section style="background: var(--light); padding: 5rem 0;">
        <div class="container">
            <h2 class="section-title mb-5">Nilai-Nilai Inti Kami</h2>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); text-align: center; transition: transform 0.3s ease;">
                            <div style="width:88px; height:88px; margin:0 auto 1rem; border-radius:50%; display:flex; align-items:center; justify-content:center; background:linear-gradient(135deg,var(--accent),#d35400); color:white; font-size:1.6rem; box-shadow:0 8px 20px rgba(0,0,0,0.08);">
                            <span aria-hidden="true">👷</span>
                        </div>
                        <h4 style="color: var(--primary); margin-bottom: 1rem; font-weight: 700;">Profesional</h4>
                        <p style="color: #666;">Tim ahli kami bekerja dengan standar kualitas tertinggi dalam setiap proyek.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); text-align: center; transition: transform 0.3s ease;">
                            <div style="width:88px; height:88px; margin:0 auto 1rem; border-radius:50%; display:flex; align-items:center; justify-content:center; background:linear-gradient(135deg,#9b59b6,#8e44ad); color:white; font-size:1.6rem; box-shadow:0 8px 20px rgba(0,0,0,0.08);">
                            <span aria-hidden="true">💡</span>
                        </div>
                        <h4 style="color: var(--primary); margin-bottom: 1rem; font-weight: 700;">Inovasi</h4>
                        <p style="color: #666;">Kami selalu mengikuti tren terbaru dalam teknologi dan desain konstruksi modern.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); text-align: center; transition: transform 0.3s ease;">
                            <div style="width:88px; height:88px; margin:0 auto 1rem; border-radius:50%; display:flex; align-items:center; justify-content:center; background:linear-gradient(135deg,#27ae60,#229954); color:white; font-size:1.6rem; box-shadow:0 8px 20px rgba(0,0,0,0.08);">
                            <span aria-hidden="true">🤝</span>
                        </div>
                        <h4 style="color: var(--primary); margin-bottom: 1rem; font-weight: 700;">Kepercayaan</h4>
                        <p style="color: #666;">Kepuasan dan kepercayaan klien adalah prioritas utama dalam setiap pekerjaan kami.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .tentang-hero {
            background: linear-gradient(135deg, var(--primary) 0%, #1e4556 100%);
            color: white;
            text-align: center;
        }

        .tentang-hero .section-title {
            color: white;
            font-size: 3rem;
            font-weight: 800;
        }

        .tentang-hero .section-subtitle {
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
    </style>
@endsection
