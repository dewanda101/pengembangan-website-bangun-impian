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
                @php
                    $kategoriList = \App\Models\Portfolio::select('kategori')->distinct()->pluck('kategori')->toArray();
                @endphp
                @foreach($kategoriList as $kat)
                    <button class="btn btn-outline-primary" onclick="filterPortofolio('{{ strtolower($kat) }}')" style="margin: 0.5rem;">
                        @php
                            if (strtolower($kat) === 'ibadah') echo 'Tempat Ibadah';
                            elseif (strtolower($kat) === 'lainya') echo 'Lainnya';
                            else echo ucfirst($kat);
                        @endphp
                    </button>
                @endforeach
            </div>

            <div class="row g-4">
                @forelse(\App\Models\Portfolio::all() as $portfolio)
                    <div class="col-md-6 col-lg-4 portofolio-item" data-kategori="{{ strtolower($portfolio->kategori) }}">
                        <div class="portfolio-card" style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 8px 25px rgba(0, 0, 0, 0.15)'" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 12px rgba(0, 0, 0, 0.1)'">
                            @if($portfolio->gambar)
                                <img src="{{ asset('storage/' . $portfolio->gambar) }}" alt="{{ $portfolio->nama_proyek }}" style="width: 100%; height: 280px; object-fit: cover;">
                            @else
                                <div style="width: 100%; height: 280px; background: linear-gradient(135deg, var(--primary) 0%, #1e4556 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 3rem;">
                                    <i class="fas fa-image"></i>
                                </div>
                            @endif
                            <div class="portfolio-content" style="padding: 2rem;">
                                <span style="display: inline-block; background: @php
                                    echo strtolower($portfolio->kategori) === 'rumah' ? 'var(--primary)' : (strtolower($portfolio->kategori) === 'komersial' ? 'var(--accent)' : '#27ae60');
                                @endphp; color: white; padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.85rem; font-weight: 600; margin-bottom: 1rem;">
                                    @php
                                        $k = strtolower($portfolio->kategori);
                                        if ($k === 'ibadah') echo 'Tempat Ibadah';
                                        elseif ($k === 'lainya') echo 'Lainnya';
                                        else echo ucfirst($k);
                                    @endphp
                                </span>
                                <h4 style="color: var(--primary); margin-bottom: 0.5rem; font-weight: 700;">{{ $portfolio->judul }}</h4>
                                <p style="color: #666; font-size: 0.95rem; margin-bottom: 1rem;">{{ $portfolio->deskripsi }}</p>
                                <div style="display: flex; justify-content: space-between; color: #999; font-size: 0.9rem;">
                                    <span>Luas: {{ $portfolio->luas }}</span>
                                    <span>{{ $portfolio->tahun }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12" style="text-align: center; padding: 3rem;">
                        <p style="color: #666; font-size: 1.1rem;">Portofolio sedang dimuat. Kembali lagi nanti!</p>
                    </div>
                @endforelse
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
