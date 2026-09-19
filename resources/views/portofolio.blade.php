@extends('layouts.app')

@section('title', 'Portofolio BangunImpian – Galeri Proyek Arsitektur & Konstruksi')

@section('extra-css')
<style>
    /* ====== PAGE HERO ====== */
    .page-hero {
        min-height: 420px;
        background: linear-gradient(105deg, rgba(10,20,38,0.92) 0%, rgba(14,27,46,0.78) 60%, rgba(14,27,46,0.6) 100%),
                    url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=1400&h=500&fit=crop&q=80') center/cover no-repeat;
        display: flex;
        align-items: center;
        padding: 8rem 0 5rem;
    }

    .page-hero-content { position: relative; z-index: 2; }

    .breadcrumb-custom {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 1.2rem;
        font-size: 0.82rem;
        color: rgba(255,255,255,0.55);
    }

    .breadcrumb-custom a { color: var(--accent); text-decoration: none; transition: color 0.3s; }
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

    /* ====== PORTFOLIO SECTION ====== */
    .portfolio-main {
        padding: 5rem 0 7rem;
        background: #f8f6f2;
    }

    /* Filter Tabs */
    .filter-tabs {
        display: flex;
        gap: 0.6rem;
        flex-wrap: wrap;
        margin-bottom: 3rem;
        padding-bottom: 2rem;
        border-bottom: 1px solid rgba(0,0,0,0.08);
    }

    .filter-tab {
        padding: 0.55rem 1.4rem;
        border-radius: 50px;
        border: 1.5px solid rgba(0,0,0,0.12);
        background: white;
        color: #666;
        font-size: 0.88rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .filter-tab.active,
    .filter-tab:hover {
        background: var(--primary);
        color: white;
        border-color: var(--primary);
        transform: translateY(-1px);
        box-shadow: 0 6px 18px rgba(14,27,46,0.2);
    }

    /* Portfolio Grid */
    .pf-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.8rem;
    }

    .pf-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.07);
        transition: all 0.4s ease;
        border: 1px solid rgba(0,0,0,0.05);
        display: flex;
        flex-direction: column;
    }

    .pf-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 24px 56px rgba(0,0,0,0.14);
    }

    .pf-img {
        position: relative;
        height: 260px;
        overflow: hidden;
    }

    .pf-img img,
    .pf-img-placeholder {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
        display: block;
    }

    .pf-img-placeholder {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-md) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: rgba(255,255,255,0.25);
        font-size: 3.5rem;
    }

    .pf-card:hover .pf-img img,
    .pf-card:hover .pf-img-placeholder { transform: scale(1.07); }

    .pf-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(14,27,46,0.6) 0%, transparent 55%);
        opacity: 0;
        transition: opacity 0.4s;
    }

    .pf-card:hover .pf-overlay { opacity: 1; }

    .pf-badge {
        position: absolute;
        top: 1rem;
        left: 1rem;
        padding: 0.35rem 0.95rem;
        border-radius: 50px;
        font-size: 0.74rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        backdrop-filter: blur(8px);
    }

    .badge-rumah     { background: rgba(14,27,46,0.82); color: var(--accent); border: 1px solid rgba(200,169,110,0.3); }
    .badge-komersial { background: rgba(200,169,110,0.9); color: var(--primary); }
    .badge-ibadah    { background: rgba(39,174,96,0.85); color: white; }
    .badge-lainya    { background: rgba(80,80,80,0.85); color: white; }

    .pf-body {
        padding: 1.6rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .pf-body h4 {
        font-size: 1.02rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 0.5rem;
        line-height: 1.35;
    }

    .pf-body p {
        font-size: 0.85rem;
        color: #777;
        line-height: 1.6;
        margin-bottom: auto;
        padding-bottom: 1rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .pf-meta {
        display: flex;
        justify-content: space-between;
        padding-top: 1rem;
        border-top: 1px solid rgba(0,0,0,0.07);
        margin-top: 0.75rem;
    }

    .pf-meta span {
        display: flex;
        align-items: center;
        gap: 0.4rem;
        font-size: 0.8rem;
        color: #999;
        font-weight: 500;
    }

    .pf-meta span i { color: var(--accent); }

    /* Empty state */
    .pf-empty {
        grid-column: 1/-1;
        text-align: center;
        padding: 5rem 2rem;
        color: #aaa;
    }

    .pf-empty i { font-size: 3rem; margin-bottom: 1rem; opacity: 0.4; display: block; }

    /* CTA */
    .pf-cta {
        background: var(--primary);
        padding: 6rem 0;
    }

    .pf-cta-inner {
        text-align: center;
        max-width: 600px;
        margin: 0 auto;
    }

    .pf-cta h2 {
        font-family: 'Playfair Display', serif;
        font-size: clamp(1.8rem, 3vw, 2.5rem);
        font-weight: 700;
        color: white;
        margin-bottom: 1rem;
    }

    .pf-cta h2 span { color: var(--accent); }

    .pf-cta p {
        color: rgba(255,255,255,0.65);
        margin-bottom: 2rem;
        font-size: 0.95rem;
    }

    .pf-cta-btns {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    /* Responsive */
    @media (max-width: 1024px) { .pf-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 640px)  { .pf-grid { grid-template-columns: 1fr; } }
</style>
@endsection

@section('content')

{{-- PAGE HERO --}}
<section class="page-hero">
    <div class="container">
        <div class="page-hero-content" data-aos="fade-up">
            <div class="breadcrumb-custom">
                <a href="{{ route('home') }}">Beranda</a>
                <i class="fas fa-chevron-right fa-xs"></i>
                <span>Portofolio</span>
            </div>
            <h1>Portofolio<br><span>Proyek Kami</span></h1>
            <p>Karya-karya terbaik yang mencerminkan dedikasi dan keahlian tim BangunImpian dalam setiap proyek</p>
        </div>
    </div>
</section>

{{-- PORTFOLIO --}}
<section class="portfolio-main">
    <div class="container">
        @php
            $kategoriList = \App\Models\Portfolio::select('kategori')->distinct()->pluck('kategori')->toArray();
        @endphp

        <div class="filter-tabs" data-aos="fade-up">
            <button class="filter-tab active" onclick="filterTab(this,'semua')">Semua Proyek</button>
            @foreach($kategoriList as $kat)
            <button class="filter-tab" onclick="filterTab(this,'{{ strtolower($kat) }}')">
                @php
                    $k = strtolower($kat);
                    if ($k === 'ibadah') echo 'Tempat Ibadah';
                    elseif ($k === 'lainya') echo 'Lainnya';
                    else echo ucfirst($k);
                @endphp
            </button>
            @endforeach
        </div>

        <div class="pf-grid" id="pfGrid">
            @forelse(\App\Models\Portfolio::all() as $i => $item)
            <div class="pf-card pf-item" data-cat="{{ strtolower($item->kategori) }}"
                 data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 100 }}">
                <div class="pf-img">
                    @if($item->gambar)
                        <img src="{{ Storage::url($item->gambar) }}" alt="{{ $item->nama_proyek }}" loading="lazy">
                    @else
                        <div class="pf-img-placeholder">
                            <i class="fas fa-building"></i>
                        </div>
                    @endif
                    <div class="pf-overlay"></div>
                    <span class="pf-badge badge-{{ strtolower($item->kategori) }}">
                        @php
                            $k = strtolower($item->kategori);
                            if ($k === 'ibadah') echo 'Tempat Ibadah';
                            elseif ($k === 'lainya') echo 'Lainnya';
                            else echo ucfirst($k);
                        @endphp
                    </span>
                </div>
                <div class="pf-body">
                    <h4>{{ $item->judul }}</h4>
                    <p>{{ $item->deskripsi }}</p>
                    <div class="pf-meta">
                        <span><i class="fas fa-ruler-combined"></i> {{ $item->luas }}</span>
                        <span><i class="fas fa-calendar-alt"></i> {{ $item->tahun }}</span>
                    </div>
                </div>
            </div>
            @empty
            <div class="pf-empty">
                <i class="fas fa-images"></i>
                <p>Portofolio sedang dipersiapkan. Kembali lagi nanti!</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="pf-cta">
    <div class="container">
        <div class="pf-cta-inner" data-aos="zoom-in">
            <div class="section-badge dark" style="margin: 0 auto 1rem;">Mulai Proyek</div>
            <h2>Tertarik Mewujudkan<br><span>Proyek Anda?</span></h2>
            <p>Diskusikan kebutuhan dan visi Anda bersama tim arsitek kami. Konsultasi pertama gratis!</p>
            <div class="pf-cta-btns">
                <a href="{{ route('kontak') }}" class="btn-gold">
                    <i class="fas fa-envelope"></i> Hubungi Kami
                </a>
                <a href="https://wa.me/6281331135822?text=Halo%20BangunImpian%2C%20saya%20tertarik%20mendiskusikan%20proyek%20saya."
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
    function filterTab(btn, cat) {
        document.querySelectorAll('.filter-tab').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        document.querySelectorAll('.pf-item').forEach(item => {
            const show = cat === 'semua' || item.dataset.cat === cat;
            item.style.transition = 'opacity 0.3s, transform 0.3s';
            if (show) {
                item.style.display = '';
                requestAnimationFrame(() => { item.style.opacity = '1'; item.style.transform = ''; });
            } else {
                item.style.opacity = '0';
                item.style.transform = 'scale(0.95)';
                setTimeout(() => { item.style.display = 'none'; }, 300);
            }
        });
    }
</script>
@endsection
