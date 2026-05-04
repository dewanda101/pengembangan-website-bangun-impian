<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Portfolio - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #2a5f7f;
            --accent: #e67e22;
        }
        body { background-color: #f8f9fa; font-family: 'Poppins', sans-serif; }
        .sidebar { background: var(--primary); min-height: 100vh; color: white; padding: 2rem 0; width: 250px; }
        .sidebar a { color: rgba(255,255,255,0.8); text-decoration: none; padding: 1rem 2rem; display: block; border-left: 4px solid transparent; }
        .sidebar a:hover, .sidebar a.active { background-color: rgba(255,255,255,0.1); color: white; border-left-color: var(--accent); }
        .sidebar .logo { text-align: center; margin-bottom: 2rem; font-weight: 700; font-size: 1.3rem; }
        .navbar-admin { background: white; padding: 1rem 2rem; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 2rem; border-radius: 8px; }
        .navbar-admin h2 { color: var(--primary); font-weight: 700; margin: 0; }
        .form-label { color: var(--primary); font-weight: 600; }
        .card { border: none; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
    <div class="d-flex">
        <div class="sidebar">
            <div class="logo"><i class="fas fa-building"></i> ADMIN</div>
            <a href="{{ route('admin.dashboard') }}"><i class="fas fa-dashboard"></i> Dashboard</a>
            <a href="{{ route('admin.kontak.index') }}"><i class="fas fa-envelope"></i> Pesan Kontak</a>
            <a href="{{ route('admin.portfolio.index') }}" class="active"><i class="fas fa-images"></i> Portfolio</a>
            <a href="{{ route('admin.layanan.index') }}"><i class="fas fa-cogs"></i> Layanan</a>
            <hr style="border-color: rgba(255,255,255,0.2); margin: 2rem 0;">
            <a href="{{ route('home') }}" style="color: var(--accent);"><i class="fas fa-external-link-alt"></i> Kembali</a>
        </div>

        <div class="flex-grow-1">
            <div class="navbar-admin" style="padding: 1rem 2rem; margin: 2rem 2rem 2rem 2rem;">
                <h2>Edit Portfolio</h2>
            </div>

            <div style="padding: 2rem;">
                <div class="card p-4" style="max-width: 700px;">
                    <form action="{{ route('admin.portfolio.update', $portfolio) }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Nama Proyek *</label>
                            <input type="text" name="nama_proyek" class="form-control @error('nama_proyek') is-invalid @enderror" value="{{ old('nama_proyek', $portfolio->nama_proyek) }}" required>
                            @error('nama_proyek') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kategori *</label>
                            <select name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                                <option value="rumah" {{ old('kategori', $portfolio->kategori) == 'rumah' ? 'selected' : '' }}>Rumah Tinggal</option>
                                <option value="komersial" {{ old('kategori', $portfolio->kategori) == 'komersial' ? 'selected' : '' }}>Komersial</option>
                                <option value="ibadah" {{ old('kategori', $portfolio->kategori) == 'ibadah' ? 'selected' : '' }}>Tempat Ibadah</option>
                                <option value="lainya" {{ old('kategori', $portfolio->kategori) == 'lainya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                            @error('kategori') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Judul *</label>
                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $portfolio->judul) }}" required>
                            @error('judul') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi *</label>
                            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4" required>{{ old('deskripsi', $portfolio->deskripsi) }}</textarea>
                            @error('deskripsi') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Luas *</label>
                            <input type="text" name="luas" class="form-control @error('luas') is-invalid @enderror" value="{{ old('luas', $portfolio->luas) }}" required>
                            @error('luas') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tahun *</label>
                            <input type="text" name="tahun" class="form-control @error('tahun') is-invalid @enderror" value="{{ old('tahun', $portfolio->tahun) }}" required>
                            @error('tahun') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gambar</label>
                            @if($portfolio->gambar)
                                <div style="margin-bottom: 1rem;">
                                    <img src="{{ Storage::url($portfolio->gambar) }}" style="max-width: 200px; border-radius: 8px;">
                                </div>
                            @endif
                            <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept=".jpg,.jpeg,.png,.gif,.webp,image/jpeg,image/png,image/gif,image/webp">
                            <small style="color: #999;">Max 2MB, format: JPG, JPEG, PNG, GIF, WebP. Biarkan kosong jika tidak ingin mengganti</small>
                            @error('gambar') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                            <a href="{{ route('admin.portfolio.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
