<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesan Kontak - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #2a5f7f;
            --accent: #e67e22;
            --light: #f8f9fa;
        }
        body {
            background-color: var(--light);
            font-family: 'Poppins', sans-serif;
        }
        .sidebar {
            background: var(--primary);
            min-height: 100vh;
            color: white;
            padding: 2rem 0;
        }
        .sidebar a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            padding: 1rem 2rem;
            display: block;
            border-left: 4px solid transparent;
            transition: all 0.3s ease;
        }
        .sidebar a:hover,
        .sidebar a.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            border-left-color: var(--accent);
        }
        .sidebar .logo {
            text-align: center;
            margin-bottom: 2rem;
            font-weight: 700;
            font-size: 1.3rem;
        }
        .main-content {
            padding: 2rem;
        }
        .navbar-admin {
            background: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
            border-radius: 8px;
        }
        .navbar-admin h2 {
            color: var(--primary);
            font-weight: 700;
            margin: 0;
        }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        .form-control, .form-select {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 0.75rem;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar" style="width: 250px;">
            <div class="logo">
                <i class="fas fa-building"></i> ADMIN
            </div>
            <a href="{{ route('admin.dashboard') }}">
                <i class="fas fa-dashboard"></i> Dashboard
            </a>
            <a href="{{ route('admin.kontak.index') }}" class="active">
                <i class="fas fa-envelope"></i> Pesan Kontak
            </a>
            <a href="{{ route('admin.portfolio.index') }}">
                <i class="fas fa-images"></i> Portfolio
            </a>
            <a href="{{ route('admin.layanan.index') }}">
                <i class="fas fa-cogs"></i> Layanan
            </a>
            <hr style="border-color: rgba(255, 255, 255, 0.2); margin: 2rem 0;">
            <a href="{{ route('home') }}" style="color: var(--accent);">
                <i class="fas fa-external-link-alt"></i> Kembali ke Website
            </a>
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1">
            <div class="navbar-admin">
                <h2>Edit Pesan Kontak</h2>
            </div>

            <div class="main-content">
                <div class="card p-4 mb-4" style="max-width: 700px;">
                    <form action="{{ route('admin.kontak.update', $kontak) }}" method="POST">
                        @csrf @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" 
                                   value="{{ old('nama', $kontak->nama) }}" required>
                            @error('nama') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                   value="{{ old('email', $kontak->email) }}" required>
                            @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Telepon</label>
                            <input type="tel" name="telepon" class="form-control @error('telepon') is-invalid @enderror" 
                                   value="{{ old('telepon', $kontak->telepon) }}" required>
                            @error('telepon') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jenis Proyek</label>
                            <input type="text" name="jenis_proyek" class="form-control @error('jenis_proyek') is-invalid @enderror" 
                                   value="{{ old('jenis_proyek', $kontak->jenis_proyek) }}" required>
                            @error('jenis_proyek') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Pesan</label>
                            <textarea name="pesan" class="form-control @error('pesan') is-invalid @enderror" 
                                      rows="6" required>{{ old('pesan', $kontak->pesan) }}</textarea>
                            @error('pesan') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                                <option value="baru" {{ old('status', $kontak->status) == 'baru' ? 'selected' : '' }}>Baru</option>
                                <option value="dibaca" {{ old('status', $kontak->status) == 'dibaca' ? 'selected' : '' }}>Dibaca</option>
                                <option value="selesai" {{ old('status', $kontak->status) == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                            @error('status') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan Perubahan
                            </button>
                            <a href="{{ route('admin.kontak.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
