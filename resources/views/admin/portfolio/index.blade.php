@extends('layouts.admin')

@section('title', 'Kelola Portfolio')

@section('content')
@push('styles')
<style>
    /* Compact pagination */
    .pagination { margin: 0; }
    .pagination .page-item { margin: 0 0.15rem; }
    .pagination .page-link {
        padding: 0.25rem 0.5rem;
        font-size: 0.92rem;
        min-width: 36px;
        height: 36px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 6px;
    }
    /* Slightly reduce card image height on small screens */
    @media (max-width: 767px) {
        .card-img-top { height: 140px !important; }
    }
    /* Make action buttons compact */
    .btn-group .btn { padding: .35rem .5rem; font-size: .9rem; }
</style>
@endpush
<div class="container-fluid">
    <div class="row">
        <aside class="col-auto d-none d-md-block" style="width:260px; background:var(--primary); min-height:100vh; padding:2rem 1rem;">
            <div class="text-white mb-4 text-center" style="font-weight:700; font-size:1.1rem;">
                <i class="fas fa-building"></i> ADMIN
            </div>
            <nav class="nav flex-column">
                <a class="nav-link text-white" href="{{ route('admin.dashboard') }}"> <i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
                <a class="nav-link text-white" href="{{ route('admin.kontak.index') }}"> <i class="fas fa-envelope me-2"></i> Pesan Kontak</a>
                <a class="nav-link text-white active" href="{{ route('admin.portfolio.index') }}"> <i class="fas fa-images me-2"></i> Portfolio</a>
                <a class="nav-link text-white" href="{{ route('admin.layanan.index') }}"> <i class="fas fa-cogs me-2"></i> Layanan</a>
                <hr style="border-color: rgba(255,255,255,0.15);">
                <a class="nav-link" style="color:var(--accent);" href="{{ route('home') }}"><i class="fas fa-external-link-alt me-2"></i> Kembali ke Website</a>
            </nav>
        </aside>

        <main class="col ps-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div>
                    <h1 class="h3 mb-0" style="color:var(--primary); font-weight:700;">Kelola Portfolio</h1>
                    <small class="text-muted">Kelola konten proyek portofolio yang ditampilkan di website.</small>
                </div>
                <div class="d-flex gap-2 align-items-center">
                    <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i> Tambah Portfolio
                    </a>
                </div>
            </div>

            @if($message = Session::get('success'))
                <div class="alert alert-success"> <i class="fas fa-check-circle me-2"></i> {{ $message }}</div>
            @endif

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @forelse($portfolios as $portfolio)
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            @if($portfolio->gambar)
                                <img src="{{ asset('storage/' . $portfolio->gambar) }}" class="card-img-top" style="height:180px; object-fit:cover;" alt="{{ $portfolio->judul }}">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center" style="height:180px;">
                                    <i class="fas fa-image fa-2x text-muted"></i>
                                </div>
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title" style="color:var(--primary); font-weight:700;">{{ $portfolio->judul }}</h5>
                                <p class="text-muted mb-2" style="font-size:0.9rem;"><strong>Kategori:</strong> {{ $portfolio->kategori }} &nbsp; • &nbsp; <strong>Tahun:</strong> {{ $portfolio->tahun }}</p>
                                <p class="card-text text-truncate" style="line-height:1.5;">{{ $portfolio->deskripsi }}</p>
                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                    <div class="text-muted" style="font-size:0.9rem;">Luas: {{ $portfolio->luas }}</div>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.portfolio.edit', $portfolio) }}" class="btn btn-sm btn-outline-warning" title="Edit"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('admin.portfolio.destroy', $portfolio) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus portfolio ini?');">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger" title="Hapus"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="card p-4 text-center text-muted">Belum ada portfolio.</div>
                    </div>
                @endforelse
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $portfolios->links() }}
            </div>
        </main>
    </div>
</div>

@endsection
