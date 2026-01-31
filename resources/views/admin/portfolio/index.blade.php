<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Portfolio - Admin</title>
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
            display: flex;
            justify-content: space-between;
            align-items: center;
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
            margin-bottom: 1.5rem;
        }
        .portfolio-card {
            display: flex;
            gap: 1.5rem;
            padding: 1.5rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 1rem;
        }
        .portfolio-card img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
        }
        .portfolio-card-content {
            flex: 1;
        }
        .portfolio-card-content h6 {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        .portfolio-card-content p {
            color: #666;
            font-size: 0.9rem;
            margin: 0.3rem 0;
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
            <a href="{{ route('admin.kontak.index') }}">
                <i class="fas fa-envelope"></i> Pesan Kontak
            </a>
            <a href="{{ route('admin.portfolio.index') }}" class="active">
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
                <h2>Kelola Portfolio</h2>
                <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Tambah Portfolio
                </a>
            </div>

            <div class="main-content">
                @if($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle"></i> {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @forelse($portfolios as $portfolio)
                    <div class="portfolio-card">
                        @if($portfolio->gambar)
                            <img src="{{ asset('storage/' . $portfolio->gambar) }}" alt="{{ $portfolio->judul }}">
                        @else
                            <div style="width: 120px; height: 120px; background: #eee; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #999;">
                                <i class="fas fa-image" style="font-size: 2rem;"></i>
                            </div>
                        @endif
                        <div class="portfolio-card-content">
                            <h6>{{ $portfolio->judul }}</h6>
                            <p><strong>Kategori:</strong> {{ $portfolio->kategori }}</p>
                            <p><strong>Luas:</strong> {{ $portfolio->luas }}</p>
                            <p><strong>Tahun:</strong> {{ $portfolio->tahun }}</p>
                            <p>{{ substr($portfolio->deskripsi, 0, 80) }}...</p>
                        </div>
                        <div style="display: flex; gap: 0.5rem; align-items: center;">
                            <a href="{{ route('admin.portfolio.edit', $portfolio) }}" class="btn btn-warning btn-sm" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.portfolio.destroy', $portfolio) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="card p-4 text-center" style="color: #999;">
                        <i class="fas fa-images" style="font-size: 2rem; margin-bottom: 1rem;"></i>
                        <p>Belum ada portfolio</p>
                    </div>
                @endforelse

                <div class="mt-4">
                    {{ $portfolios->links() }}
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
