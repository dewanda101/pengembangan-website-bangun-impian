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
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h2>Dashboard Admin BangunImpian</h2>
                    <div>
                        <span style="color: #666; margin-right: 2rem;">
                            <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                        </span>
                        <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="main-content">
                <!-- NEW MESSAGE NOTIFICATION -->
                @php
                    $newMessages = \App\Models\Kontak::where('status', 'baru')->count();
                @endphp
                @if($newMessages > 0)
                    <div style="background: linear-gradient(135deg, #fff3cd 0%, #fff8e1 100%); border: 2px solid #ffc107; border-radius: 12px; padding: 1.5rem; margin-bottom: 2rem; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 4px 12px rgba(255, 193, 7, 0.2);">
                        <div>
                            <h5 style="color: #856404; margin: 0 0 0.5rem 0; font-weight: 700;">
                                <i class="fas fa-bell"></i> Notifikasi Pesanan Baru!
                            </h5>
                            <p style="color: #856404; margin: 0; font-size: 1rem;">
                                Ada <strong>{{ $newMessages }} pesan baru</strong> yang menunggu untuk direspons. Segera tinjau dan hubungi pelanggan!
                            </p>
                        </div>
                        <a href="{{ route('admin.kontak.index') }}" class="btn btn-warning" style="white-space: nowrap; margin-left: 1rem;">
                            Lihat Pesanan <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                @endif

                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="stat-card" onclick="location.href='{{ route('admin.kontak.index') }}'" style="cursor: pointer; transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 16px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 8px rgba(0,0,0,0.1)'">
                            <i class="fas fa-envelope" style="font-size: 2.5rem; color: var(--primary);"></i>
                            <div class="number">{{ \App\Models\Kontak::count() }}</div>
                            <h5>Pesan Kontak</h5>
                            <small style="color: #ff6b6b;">{{ $newMessages }} baru</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-card" onclick="location.href='{{ route('admin.portfolio.index') }}'" style="cursor: pointer; transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 16px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 8px rgba(0,0,0,0.1)'">
                            <i class="fas fa-images" style="font-size: 2.5rem; color: var(--accent);"></i>
                            <div class="number">{{ \App\Models\Portfolio::count() }}</div>
                            <h5>Portfolio</h5>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-card" onclick="location.href='{{ route('admin.layanan.index') }}'" style="cursor: pointer; transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 16px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 8px rgba(0,0,0,0.1)'">
                            <i class="fas fa-cogs" style="font-size: 2.5rem; color: #27ae60;"></i>
                            <div class="number">{{ \App\Models\Layanan::count() }}</div>
                            <h5>Layanan</h5>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-card" onclick="location.href='{{ route('admin.kontak.index') }}'" style="cursor: pointer; transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 16px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 8px rgba(0,0,0,0.1)'">
                            <i class="fas fa-check-circle" style="font-size: 2.5rem; color: #27ae60;"></i>
                            <div class="number">{{ \App\Models\Kontak::where('status', 'selesai')->count() }}</div>
                            <h5>Pesan Selesai</h5>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="card p-4">
                            <h5 class="mb-3" style="color: var(--primary); font-weight: 700;">
                                <i class="fas fa-inbox"></i> Pesan Kontak Terbaru
                            </h5>
                            <div style="max-height: 500px; overflow-y: auto;">
                                @forelse(\App\Models\Kontak::latest()->take(10)->get() as $kontak)
                                    <div style="padding: 1.2rem; border-bottom: 1px solid #eee; border-left: 4px solid {{ $kontak->status === 'baru' ? '#ff6b6b' : ($kontak->status === 'dibaca' ? '#95a5a6' : '#27ae60') }};">
                                        <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 0.5rem;">
                                            <div style="flex: 1;">
                                                <strong style="color: var(--primary); font-size: 1.05rem;">{{ $kontak->nama }}</strong>
                                                @if($kontak->status === 'baru')
                                                    <span style="background: #ff6b6b; color: white; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.75rem; font-weight: 600; margin-left: 0.5rem;">BARU</span>
                                                @endif
                                            </div>
                                            <span style="font-size: 0.85rem; color: #999; white-space: nowrap;">{{ $kontak->created_at->diffForHumans() }}</span>
                                        </div>
                                        <small style="color: #666; display: block; margin-bottom: 0.5rem;">
                                            <i class="fas fa-phone"></i> {{ $kontak->telepon }}
                                        </small>
                                        <small style="color: #888;">{{ substr($kontak->pesan, 0, 80) }}{{ strlen($kontak->pesan) > 80 ? '...' : '' }}</small>
                                        <div style="margin-top: 0.8rem;">
                                            <a href="{{ route('admin.kontak.show', $kontak) }}" class="btn btn-sm btn-outline-primary" style="font-size: 0.85rem;">
                                                <i class="fas fa-eye"></i> Lihat Detail
                                            </a>
                                        </div>
                                    </div>
                                @empty
                                    <p style="color: #999; text-align: center; padding: 2rem;">Belum ada pesan</p>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card p-4 mb-3">
                            <h5 class="mb-3" style="color: var(--primary); font-weight: 700;">
                                <i class="fas fa-keyboard"></i> Quick Actions
                            </h5>
                            <div class="d-grid gap-2">
                                <a href="{{ route('admin.kontak.index') }}" class="btn btn-primary">
                                    <i class="fas fa-envelope"></i> Kelola Pesan
                                </a>
                                <a href="{{ route('admin.portfolio.create') }}" class="btn btn-outline-primary">
                                    <i class="fas fa-plus-circle"></i> Tambah Portfolio
                                </a>
                                <a href="{{ route('admin.layanan.create') }}" class="btn btn-outline-primary">
                                    <i class="fas fa-plus-circle"></i> Tambah Layanan
                                </a>
                            </div>
                        </div>

                        <div class="card p-4" style="background: linear-gradient(135deg, var(--primary) 0%, #1e4556 100%); color: white; border: none;">
                            <h5 class="mb-2" style="font-weight: 700;">
                                <i class="fas fa-info-circle"></i> Info
                            </h5>
                            <p style="margin: 0; font-size: 0.95rem; line-height: 1.6;">
                                Jangan lupa untuk merespons setiap pesan pelanggan dalam waktu maksimal 24 jam. Tingkatkan kepuasan pelanggan dengan respons cepat!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
