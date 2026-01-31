<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pesan Kontak - Admin</title>
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
        .table-responsive {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        .badge-baru {
            background-color: #3498db;
        }
        .badge-dibaca {
            background-color: #95a5a6;
        }
        .badge-selesai {
            background-color: #27ae60;
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
                <h2>Kelola Pesan Kontak</h2>
                <a href="{{ route('admin.kontak.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Tambah Pesan
                </a>
            </div>

            <div class="main-content">
                @if($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle"></i> {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="table-responsive p-4">
                    <table class="table table-hover mb-0">
                        <thead style="background-color: var(--light);">
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Jenis Proyek</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($kontaks as $kontak)
                                <tr>
                                    <td><strong>{{ $kontak->nama }}</strong></td>
                                    <td>{{ $kontak->email }}</td>
                                    <td>{{ $kontak->telepon }}</td>
                                    <td>{{ $kontak->jenis_proyek }}</td>
                                    <td>
                                        <span class="badge badge-{{ $kontak->status }}">
                                            {{ ucfirst($kontak->status) }}
                                        </span>
                                    </td>
                                    <td><small>{{ $kontak->created_at->format('d/m/Y H:i') }}</small></td>
                                    <td>
                                        <a href="{{ route('admin.kontak.show', $kontak) }}" class="btn btn-sm btn-info" title="Lihat">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.kontak.edit', $kontak) }}" class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.kontak.destroy', $kontak) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4" style="color: #999;">
                                        Belum ada pesan kontak
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $kontaks->links() }}
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
