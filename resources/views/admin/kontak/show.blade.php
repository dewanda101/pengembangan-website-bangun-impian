<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Pesan Kontak - Admin</title>
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
        .card { border: none; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        .detail-row { padding: 1rem; border-bottom: 1px solid #eee; }
        .detail-row:last-child { border-bottom: none; }
        .detail-label { color: var(--primary); font-weight: 600; width: 150px; }
    </style>
</head>
<body>
    <div class="d-flex">
        <div class="sidebar">
            <div class="logo"><i class="fas fa-building"></i> ADMIN</div>
            <a href="{{ route('admin.dashboard') }}"><i class="fas fa-dashboard"></i> Dashboard</a>
            <a href="{{ route('admin.kontak.index') }}" class="active"><i class="fas fa-envelope"></i> Pesan Kontak</a>
            <a href="{{ route('admin.portfolio.index') }}"><i class="fas fa-images"></i> Portfolio</a>
            <a href="{{ route('admin.layanan.index') }}"><i class="fas fa-cogs"></i> Layanan</a>
            <hr style="border-color: rgba(255,255,255,0.2); margin: 2rem 0;">
            <a href="{{ route('home') }}" style="color: var(--accent);"><i class="fas fa-external-link-alt"></i> Kembali</a>
        </div>

        <div class="flex-grow-1">
            <div class="navbar-admin" style="padding: 1rem 2rem; margin: 2rem 2rem 2rem 2rem;">
                <h2>Detail Pesan Kontak</h2>
            </div>

            <div style="padding: 2rem;">
                <div class="card" style="max-width: 700px;">
                    <div class="detail-row">
                        <div style="display: flex;">
                            <span class="detail-label">Nama:</span>
                            <span>{{ $kontak->nama }}</span>
                        </div>
                    </div>
                    <div class="detail-row">
                        <div style="display: flex;">
                            <span class="detail-label">Email:</span>
                            <span><a href="mailto:{{ $kontak->email }}">{{ $kontak->email }}</a></span>
                        </div>
                    </div>
                    <div class="detail-row">
                        <div style="display: flex;">
                            <span class="detail-label">Telepon:</span>
                            <span><a href="tel:{{ $kontak->telepon }}">{{ $kontak->telepon }}</a></span>
                        </div>
                    </div>
                    <div class="detail-row">
                        <div style="display: flex;">
                            <span class="detail-label">Jenis Proyek:</span>
                            <span>{{ $kontak->jenis_proyek }}</span>
                        </div>
                    </div>
                    <div class="detail-row">
                        <div style="display: flex;">
                            <span class="detail-label">Status:</span>
                            <span>
                                <span class="badge" style="background-color: {{ $kontak->status == 'baru' ? '#3498db' : ($kontak->status == 'dibaca' ? '#95a5a6' : '#27ae60') }}">
                                    {{ ucfirst($kontak->status) }}
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="detail-row">
                        <div style="display: flex;">
                            <span class="detail-label">Tanggal:</span>
                            <span>{{ $kontak->created_at->format('d M Y H:i') }}</span>
                        </div>
                    </div>
                    <div class="detail-row">
                        <div>
                            <strong style="color: var(--primary);">Pesan:</strong>
                            <div style="margin-top: 0.5rem; color: #666; line-height: 1.6;">
                                {{ nl2br($kontak->pesan) }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4" style="display: flex; gap: 1rem;">
                    <a href="{{ route('admin.kontak.edit', $kontak) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('admin.kontak.destroy', $kontak) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin hapus?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                    <a href="{{ route('admin.kontak.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
