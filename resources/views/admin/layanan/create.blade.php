<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Layanan - Admin</title>
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
            <a href="{{ route('admin.portfolio.index') }}"><i class="fas fa-images"></i> Portfolio</a>
            <a href="{{ route('admin.layanan.index') }}" class="active"><i class="fas fa-cogs"></i> Layanan</a>
            <hr style="border-color: rgba(255,255,255,0.2); margin: 2rem 0;">
            <a href="{{ route('home') }}" style="color: var(--accent);"><i class="fas fa-external-link-alt"></i> Kembali</a>
        </div>

        <div class="flex-grow-1">
            <div class="navbar-admin" style="padding: 1rem 2rem; margin: 2rem 2rem 2rem 2rem;">
                <h2>Tambah Layanan</h2>
            </div>

            <div style="padding: 2rem;">
                <div class="card p-4" style="max-width: 700px;">
                    <form action="{{ route('admin.layanan.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Judul Layanan *</label>
                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}" required>
                            @error('judul') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi *</label>
                            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4" required>{{ old('deskripsi') }}</textarea>
                            @error('deskripsi') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fitur 1 *</label>
                            <input type="text" name="fitur_1" class="form-control @error('fitur_1') is-invalid @enderror" value="{{ old('fitur_1') }}" required>
                            @error('fitur_1') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fitur 2 *</label>
                            <input type="text" name="fitur_2" class="form-control @error('fitur_2') is-invalid @enderror" value="{{ old('fitur_2') }}" required>
                            @error('fitur_2') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fitur 3 *</label>
                            <input type="text" name="fitur_3" class="form-control @error('fitur_3') is-invalid @enderror" value="{{ old('fitur_3') }}" required>
                            @error('fitur_3') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Warna Icon</label>
                            <select name="icon_color" class="form-select @error('icon_color') is-invalid @enderror" required>
                                @foreach($colors as $value => $label)
                                    <option value="{{ $value }}" {{ old('icon_color', 'var(--primary)') == $value ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('icon_color') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                            <a href="{{ route('admin.layanan.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
