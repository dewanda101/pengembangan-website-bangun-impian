<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - BangunImpian</title>
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
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        .stat-card {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            text-align: center;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        .stat-card h5 {
            color: var(--primary);
            font-weight: 700;
            margin-top: 1rem;
        }
        .stat-card .number {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--accent);
        }
        .navbar-admin {
            background: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }
        .navbar-admin h2 {
            color: var(--primary);
            font-weight: 700;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <i class="fas fa-building"></i> ADMIN
            </div>
            <a href="{{ route('admin.dashboard') }}" class="active">
                <i class="fas fa-dashboard"></i> Dashboard
            </a>
            <a href="{{ route('admin.kontak.index') }}">
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
                <h2>Dashboard Admin BangunImpian</h2>
            </div>

            <div class="main-content">
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="stat-card">
                            <i class="fas fa-envelope" style="font-size: 2.5rem; color: var(--primary);"></i>
                            <div class="number">{{ \App\Models\Kontak::count() }}</div>
                            <h5>Pesan Kontak</h5>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-card">
                            <i class="fas fa-images" style="font-size: 2.5rem; color: var(--accent);"></i>
                            <div class="number">{{ \App\Models\Portfolio::count() }}</div>
                            <h5>Portfolio</h5>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-card">
                            <i class="fas fa-cogs" style="font-size: 2.5rem; color: #27ae60;"></i>
                            <div class="number">{{ \App\Models\Layanan::count() }}</div>
                            <h5>Layanan</h5>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-card">
                            <i class="fas fa-check-circle" style="font-size: 2.5rem; color: #3498db;"></i>
                            <div class="number">{{ \App\Models\Kontak::where('status', 'selesai')->count() }}</div>
                            <h5>Pesan Selesai</h5>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card p-4">
                            <h5 class="mb-3" style="color: var(--primary); font-weight: 700;">Pesan Kontak Terbaru</h5>
                            <div style="max-height: 400px; overflow-y: auto;">
                                @forelse(\App\Models\Kontak::latest()->take(5)->get() as $kontak)
                                    <div style="padding: 1rem; border-bottom: 1px solid #eee;">
                                        <div style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                                            <strong style="color: var(--primary);">{{ $kontak->nama }}</strong>
                                            <span style="font-size: 0.85rem; color: #999;">{{ $kontak->created_at->diffForHumans() }}</span>
                                        </div>
                                        <small style="color: #666;">{{ substr($kontak->pesan, 0, 60) }}...</small>
                                    </div>
                                @empty
                                    <p style="color: #999; text-align: center;">Belum ada pesan</p>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card p-4">
                            <h5 class="mb-3" style="color: var(--primary); font-weight: 700;">Quick Actions</h5>
                            <div class="d-grid gap-2">
                                <a href="{{ route('admin.kontak.index') }}" class="btn btn-outline-primary">
                                    <i class="fas fa-envelope"></i> Lihat Semua Pesan
                                </a>
                                <a href="{{ route('admin.portfolio.create') }}" class="btn btn-outline-primary">
                                    <i class="fas fa-plus"></i> Tambah Portfolio
                                </a>
                                <a href="{{ route('admin.layanan.create') }}" class="btn btn-outline-primary">
                                    <i class="fas fa-plus"></i> Tambah Layanan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
