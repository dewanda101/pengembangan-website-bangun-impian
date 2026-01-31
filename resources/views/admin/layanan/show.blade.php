@extends('layouts.app')

@section('title', 'Detail Layanan')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card p-4">
                <h2 class="mb-3" style="color: var(--primary);">{{ $layanan->judul }}</h2>
                <p>{{ $layanan->deskripsi }}</p>
                <ul>
                    <li>{{ $layanan->fitur_1 }}</li>
                    <li>{{ $layanan->fitur_2 }}</li>
                    <li>{{ $layanan->fitur_3 }}</li>
                </ul>
                <a href="{{ route('admin.layanan.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
