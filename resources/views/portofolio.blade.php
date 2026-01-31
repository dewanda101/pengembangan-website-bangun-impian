@extends('layouts.app')

@section('title', 'Portofolio BangunImpian - Galeri Proyek Terbaik')

@section('content')
    <!-- PORTOFOLIO HERO -->
    <section class="portofolio-hero">
        <div class="container py-5">
            <h1 class="section-title mb-4">Portofolio Kami</h1>
            <p class="section-subtitle mb-5">Karya-Karya Terbaik Dari Tim BangunImpian</p>
        </div>
    </section>

    <!-- PORTOFOLIO CONTENT -->
    <section class="portofolio-section py-5">
        <div class="container">
            <!-- Filter Kategori -->
            <div style="text-align: center; margin-bottom: 3rem;">
                <button class="btn btn-outline-primary" onclick="filterPortofolio('semua')" style="margin: 0.5rem;">Semua Proyek</button>
                <button class="btn btn-outline-primary" onclick="filterPortofolio('rumah')" style="margin: 0.5rem;">Rumah Tinggal</button>
                <button class="btn btn-outline-primary" onclick="filterPortofolio('komersial')" style="margin: 0.5rem;">Komersial</button>
                <button class="btn btn-outline-primary" onclick="filterPortofolio('ibadah')" style="margin: 0.5rem;">Tempat Ibadah</button>
            </div>

            <div class="row g-4">
                <!-- Rumah Minimalis Modern -->
                <div class="col-md-6 col-lg-4 portofolio-item" data-kategori="rumah">
                    <div class="portfolio-card" style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 8px 25px rgba(0, 0, 0, 0.15)'" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 12px rgba(0, 0, 0, 0.1)'">
                        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=500&h=400&fit=crop" alt="Rumah Minimalis" style="width: 100%; height: 280px; object-fit: cover;">
                        <div class="portfolio-content" style="padding: 2rem;">
                            <span style="display: inline-block; background: var(--primary); color: white; padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.85rem; font-weight: 600; margin-bottom: 1rem;">Rumah Tinggal</span>
                            <h4 style="color: var(--primary); margin-bottom: 0.5rem; font-weight: 700;">Rumah Minimalis Modern</h4>
                            <p style="color: #666; font-size: 0.95rem; margin-bottom: 1rem;">Desain minimalis dengan sentuhan modern yang elegan dan fungsional untuk keluarga muda di Surabaya.</p>
                            <div style="display: flex; justify-content: space-between; color: #999; font-size: 0.9rem;">
                                <span>Luas: 250 m²</span>
                                <span>2022</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Masjid Megah -->
                <div class="col-md-6 col-lg-4 portofolio-item" data-kategori="ibadah">
                    <div class="portfolio-card" style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 8px 25px rgba(0, 0, 0, 0.15)'" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 12px rgba(0, 0, 0, 0.1)'">
                       <img src="{{ asset('images/int masjid.jpg') }}" alt="Masjid" style="width: 100%; height: 280px; object-fit: cover;">
                        <div class="portfolio-content" style="padding: 2rem;">
                            <span style="display: inline-block; background: #27ae60; color: white; padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.85rem; font-weight: 600; margin-bottom: 1rem;">Tempat Ibadah</span>
                            <h4 style="color: var(--primary); margin-bottom: 0.5rem; font-weight: 700;">Masjid Darrusalam Tambak Osowilangun Surabaya</h4>
                            <p style="color: #666; font-size: 0.95rem; margin-bottom: 1rem;">Arsitektur islami modern yang kokoh dan nyaman untuk jemaah dalam melaksanakan ibadah dengan khusyuk.</p>
                            <div style="display: flex; justify-content: space-between; color: #999; font-size: 0.9rem;">
                                <span>Luas: 12000 m²</span>
                                <span>2021 -2025</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Café Cozy -->
                <div class="col-md-6 col-lg-4 portofolio-item" data-kategori="komersial">
                    <div class="portfolio-card" style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 8px 25px rgba(0, 0, 0, 0.15)'" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 12px rgba(0, 0, 0, 0.1)'">
                        <img src="{{ asset('images/cafe dog.png') }}" alt="Café" style="width: 100%; height: 280px; object-fit: cover;">
                        <div class="portfolio-content" style="padding: 2rem;">
                            <span style="display: inline-block; background: var(--accent); color: white; padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.85rem; font-weight: 600; margin-bottom: 1rem;">Komersial</span>
                            <h4 style="color: var(--primary); margin-bottom: 0.5rem; font-weight: 700;">Café Dog Kota Malang </h4>
                            <p style="color: #666; font-size: 0.95rem; margin-bottom: 1rem;">Interior café yang nyaman dan modern dengan konsep minimalis yang sempurna untuk meningkatkan brand.</p>
                            <div style="display: flex; justify-content: space-between; color: #999; font-size: 0.9rem;">
                                <span>Luas: 180 m²</span>
                                <span>2023</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Rumah Klasik -->
                <div class="col-md-6 col-lg-4 portofolio-item" data-kategori="rumah">
                    <div class="portfolio-card" style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 8px 25px rgba(0, 0, 0, 0.15)'" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 12px rgba(0, 0, 0, 0.1)'">
                        <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=500&h=400&fit=crop" alt="Rumah Klasik" style="width: 100%; height: 280px; object-fit: cover;">
                        <div class="portfolio-content" style="padding: 2rem;">
                            <span style="display: inline-block; background: var(--primary); color: white; padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.85rem; font-weight: 600; margin-bottom: 1rem;">Rumah Tinggal</span>
                            <h4 style="color: var(--primary); margin-bottom: 0.5rem; font-weight: 700;">Rumah Klasik Elegan</h4>
                            <p style="color: #666; font-size: 0.95rem; margin-bottom: 1rem;">Rumah bergaya klasik dengan sentuhan modern yang memberikan kesan mewah dan nyaman untuk keluarga besar.</p>
                            <div style="display: flex; justify-content: space-between; color: #999; font-size: 0.9rem;">
                                <span>Luas: 350 m²</span>
                                <span>2023</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Toko Retail -->
                <div class="col-md-6 col-lg-4 portofolio-item" data-kategori="komersial">
                    <div class="portfolio-card" style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 8px 25px rgba(0, 0, 0, 0.15)'" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 12px rgba(0, 0, 0, 0.1)'">
                       <img src="{{ asset('images/swalayan.jpeg') }}" alt="Masjid" style="width: 100%; height: 280px; object-fit: cover;">
                        <div class="portfolio-content" style="padding: 2rem;">
                            <span style="display: inline-block; background: var(--accent); color: white; padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.85rem; font-weight: 600; margin-bottom: 1rem;">Komersial</span>
                            <h4 style="color: var(--primary); margin-bottom: 0.5rem; font-weight: 700;">Swalayan Usaha Baru Premium</h4>
                            <p style="color: #666; font-size: 0.95rem; margin-bottom: 1rem;">Desain toko retail modern dengan layout yang optimal untuk meningkatkan penjualan dan kenyamanan pembeli.</p>
                            <div style="display: flex; justify-content: space-between; color: #999; font-size: 0.9rem;">
                                <span>Luas: 2000 m²</span>
                                <span>2018 - 2020</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Madrasa -->
                <div class="col-md-6 col-lg-4 portofolio-item" data-kategori="komersial">
                    <div class="portfolio-card" style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 8px 25px rgba(0, 0, 0, 0.15)'" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 12px rgba(0, 0, 0, 0.1)'">
                       <img src="{{ asset('images/kost.jpg') }}" alt="kost" style="width: 100%; height: 280px; object-fit: cover;">
                        <div class="portfolio-content" style="padding: 2rem;">
                            <span style="display: inline-block;background: var(--accent); color: white; padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.85rem; font-weight: 600; margin-bottom: 1rem;">Komersial</span>
                            <h4 style="color: var(--primary); margin-bottom: 0.5rem; font-weight: 700;">Kost & Home Stay</h4>
                            <p style="color: #666; font-size: 0.95rem; margin-bottom: 1rem;">Bangunan kost dan home stay dengan fasilitas lengkap yang nyaman untuk tamu jangka panjang dengan desain modern dan fungsional.</p>
                            <div style="display: flex; justify-content: space-between; color: #999; font-size: 0.9rem;">
                                <span>Luas: 800 m²</span>
                                <span>2021</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CALL TO ACTION -->
    <section style="background: linear-gradient(135deg, var(--primary) 0%, #1e4556 100%); color: white; padding: 5rem 0; text-align: center;">
        <div class="container">
            <h2 style="font-size: 2.5rem; font-weight: 800; margin-bottom: 1.5rem;">Tertarik Dengan Portofolio Kami?</h2>
            <p style="font-size: 1.1rem; margin-bottom: 2rem; opacity: 0.9;">Hubungi kami sekarang untuk diskusi tentang proyek impian Anda</p>
            <a href="{{ route('kontak') }}" class="btn btn-light btn-lg" style="font-weight: 600;">Hubungi Kami Sekarang</a>
        </div>
    </section>

    <script>
        function filterPortofolio(kategori) {
            const items = document.querySelectorAll('.portofolio-item');
            
            items.forEach(item => {
                if (kategori === 'semua' || item.getAttribute('data-kategori') === kategori) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }
    </script>

    <style>
        .portofolio-hero {
            background: linear-gradient(135deg, var(--primary) 0%, #1e4556 100%);
            color: white;
            text-align: center;
        }

        .portofolio-hero .section-title {
            color: white;
            font-size: 3rem;
            font-weight: 800;
        }

        .portofolio-hero .section-subtitle {
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

        /* Equal-height portfolio cards */
        .portofolio-section .row > [class*="col-"] {
            display: flex;
        }

        .portofolio-section .portfolio-card {
            display: flex;
            flex-direction: column;
            width: 100%;
            min-height: 650px;
            border-top: 5px solid var(--primary);
        }

        .portofolio-section .portfolio-card img {
            flex: 0 0 280px;
            height: 280px;
        }

        .portofolio-section .portfolio-content {
            flex: 1 1 auto;
            padding: 2rem;
        }
    </style>
@endsection
