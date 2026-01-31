@extends('layouts.admin')

@section('title', 'Detail Portfolio')

@section('content')
<div class="container-fluid">
    <div class="row">
        <aside class="col-auto d-none d-md-block" style="width:260px; background:var(--primary); min-height:100vh; padding:2rem 1rem;">
            <div class="text-white mb-4 text-center" style="font-weight:700; font-size:1.1rem;">
                <i class="fas fa-building"></i> ADMIN
            </div>
            <nav class="nav flex-column">
                <a class="nav-link text-white" href="{{ route('admin.dashboard') }}"> <i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
                <a class="nav-link text-white" href="{{ route('admin.kontak.index') }}"> <i class="fas fa-envelope me-2"></i> Pesan Kontak</a>
                <a class="nav-link text-white" href="{{ route('admin.portfolio.index') }}"> <i class="fas fa-images me-2"></i> Portfolio</a>
                <a class="nav-link text-white" href="{{ route('admin.layanan.index') }}"> <i class="fas fa-cogs me-2"></i> Layanan</a>
                <hr style="border-color: rgba(255,255,255,0.15);">
                <a class="nav-link" style="color:var(--accent);" href="{{ route('home') }}"><i class="fas fa-external-link-alt me-2"></i> Kembali ke Website</a>
            </nav>
        </aside>

        <main class="col ps-4">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="card shadow-sm">
                            @if($portfolio->gambar)
                                <img src="{{ asset('storage/' . $portfolio->gambar) }}" class="card-img-top" style="object-fit:cover; max-height:360px;">
                            @endif
                            <div class="card-body">
                                <h2 class="card-title">{{ $portfolio->judul }}</h2>
                                <p class="card-text">{{ $portfolio->deskripsi }}</p>
                                <ul>
                                    <li><strong>Luas:</strong> {{ $portfolio->luas }}</li>
                                    <li><strong>Tahun:</strong> {{ $portfolio->tahun }}</li>
                                    <li><strong>Kategori:</strong> {{ $portfolio->kategori }}</li>
                                </ul>
                                <a href="{{ route('admin.portfolio.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
