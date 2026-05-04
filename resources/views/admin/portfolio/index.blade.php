@extends('layouts.admin')

@section('title', 'Kelola Portfolio')

@section('content')
@push('styles')
<style>
    /* ===== GLOBAL LOCK ===== */
    body, html {
        overflow-x: hidden;
    }

    .container-fluid {
        max-width: 100%;
        overflow-x: hidden;
    }

    /* ===== SIDEBAR ===== */
    .admin-sidebar {
        width: 240px;
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh;
        overflow-y: auto;
        z-index: 1000;
    }

    /* ===== MAIN CONTENT ===== */
    .admin-main {
        margin-left: 240px;
        max-width: calc(100% - 240px);
        padding: 24px;
        overflow-x: hidden;
    }

    /* ===== CONTENT WRAPPER ===== */
    .portfolio-wrapper {
        background: #fff;
        border-radius: 12px;
        padding: 24px;
        box-shadow: 0 4px 16px rgba(0,0,0,0.06);
        width: 100%;
        overflow: hidden;
    }

    /* ===== CARD ===== */
    .card {
        max-width: 100%;
    }

    .card-img-top {
        height: 180px;
        object-fit: cover;
    }

    .card-title {
        font-size: 1.05rem;
        font-weight: 700;
        color: var(--primary);
    }

    .card-text {
        font-size: 0.9rem;
        color: #555;
        line-height: 1.5;
    }

    .card-footer-custom {
        border-top: 1px solid #eee;
        padding-top: 10px;
        margin-top: 12px;
    }

    /* ===== GRID FIX ===== */
    .row {
        margin-left: 0;
        margin-right: 0;
    }

    /* ===== PAGINATION ===== */
    .pagination .page-link {
        min-width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 6px;
    }

    .pagination .active .page-link {
        background: var(--primary);
        border-color: var(--primary);
        color: #fff;
    }

    /* ===== MOBILE ===== */
    @media (max-width: 768px) {
        .admin-sidebar {
            position: relative;
            width: 100%;
            height: auto;
        }

        .admin-main {
            margin-left: 0;
            max-width: 100%;
            padding: 16px;
        }
    }
</style>
@endpush

<div class="container-fluid">
    <div class="row">
        {{-- SIDEBAR --}}
        <aside class="admin-sidebar d-none d-md-block">
            <div class="text-white mb-4 text-center" style="font-weight:700; font-size:1.1rem;">
                <i class="fas fa-building"></i> ADMIN
            </div>
            <nav class="nav flex-column">
                <a class="nav-link text-white" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                </a>
                <a class="nav-link text-white" href="{{ route('admin.kontak.index') }}">
                    <i class="fas fa-envelope me-2"></i> Pesan Kontak
                </a>
                <a class="nav-link text-white active" href="{{ route('admin.portfolio.index') }}">
                    <i class="fas fa-images me-2"></i> Portfolio
                </a>
                <a class="nav-link text-white" href="{{ route('admin.layanan.index') }}">
                    <i class="fas fa-cogs me-2"></i> Layanan
                </a>
                <hr style="border-color: rgba(255,255,255,0.15);">
                <a class="nav-link" style="color:var(--accent);" href="{{ route('home') }}">
                    <i class="fas fa-external-link-alt me-2"></i> Kembali ke Website
                </a>
            </nav>
        </aside>

        {{-- MAIN --}}
        <main class="admin-main">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="h3 mb-0" style="font-weight:700;">Kelola Portfolio</h1>
                    <small class="text-muted">
                        Kelola konten proyek portofolio yang ditampilkan di website.
                    </small>
                </div>
                <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i> Tambah Portfolio
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            <div class="portfolio-wrapper">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @forelse($portfolios as $portfolio)
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                {{-- GAMBAR --}}
                                @if($portfolio->gambar)
                                    <img src="{{ Storage::url($portfolio->gambar) }}"
                                         class="card-img-top"
                                         alt="{{ $portfolio->judul }}">
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center"
                                         style="height:180px;">
                                        <i class="fas fa-image fa-2x text-muted"></i>
                                    </div>
                                @endif

                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $portfolio->judul }}</h5>

                                    <p class="text-muted mb-2" style="font-size:0.9rem;">
                                        <strong>Kategori:</strong> {{ $portfolio->kategori }}
                                        &nbsp;•&nbsp;
                                        <strong>Tahun:</strong> {{ $portfolio->tahun }}
                                    </p>

                                    <p class="card-text text-truncate">
                                        {{ $portfolio->deskripsi }}
                                    </p>

                                    <div class="card-footer-custom d-flex justify-content-between align-items-center mt-auto">
                                        <span class="text-muted" style="font-size:0.9rem;">
                                            Luas: {{ $portfolio->luas }}
                                        </span>

                                        <div class="btn-group">
                                            <a href="{{ route('admin.portfolio.edit', $portfolio) }}"
                                               class="btn btn-sm btn-outline-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.portfolio.destroy', $portfolio) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus portfolio ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-outline-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="text-center text-muted py-4">
                                Belum ada portfolio.
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

            {{-- PAGINATION --}}
            @if($portfolios->hasPages())
                <div class="mt-4">
                    {{ $portfolios->links() }}
                </div>
            @endif
        </main>
    </div>
</div>
@endsection
