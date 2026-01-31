@extends('layouts.app')

@section('title', 'Detail Portfolio')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <img src="{{ asset('storage/' . $portfolio->gambar) }}" class="card-img-top">
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
@endsection
