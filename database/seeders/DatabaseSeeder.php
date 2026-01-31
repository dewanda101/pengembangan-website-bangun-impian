<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Portfolio;
use App\Models\Layanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        if (!User::where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        }

        // Ensure there is at least one 'lainya' category sample
        if (!Portfolio::where('kategori', 'lainya')->exists()) {
            Portfolio::create([
                'nama_proyek' => 'Proyek Lainnya Contoh',
                'kategori' => 'lainya',
                'judul' => 'Proyek Lainnya Contoh',
                'deskripsi' => 'Contoh proyek untuk kategori lainnya.',
                'luas' => '150 m²',
                'tahun' => '2024',
            ]);
        }

        // Create an admin user for accessing admin panel
        if (!User::where('email', 'admin@local')->exists()) {
            User::create([
                'name' => 'Administrator',
                'email' => 'admin@local',
                'password' => bcrypt('password'),
                'is_admin' => true,
            ]);
        }

        // Create second admin user
        if (!User::where('email', 'admin2@local')->exists()) {
            User::create([
                'name' => 'Administrator 2',
                'email' => 'admin2@local',
                'password' => bcrypt('admin123'),
                'is_admin' => true,
            ]);
        }

        // Seed initial portfolio projects
        if (Portfolio::count() === 0) {
            Portfolio::create([
                'nama_proyek' => 'Rumah Minimalis Modern',
                'kategori' => 'rumah',
                'judul' => 'Rumah Minimalis Modern',
                'deskripsi' => 'Desain minimalis dengan sentuhan modern yang elegan dan fungsional untuk keluarga muda di Surabaya.',
                'luas' => '250 m²',
                'tahun' => '2022',
            ]);

            Portfolio::create([
                'nama_proyek' => 'Masjid Darrusalam',
                'kategori' => 'ibadah',
                'judul' => 'Masjid Darrusalam Tambak Osowilangun Surabaya',
                'deskripsi' => 'Arsitektur islami modern yang kokoh dan nyaman untuk jemaah dalam melaksanakan ibadah dengan khusyuk.',
                'luas' => '12000 m²',
                'tahun' => '2021 - 2025',
            ]);

            Portfolio::create([
                'nama_proyek' => 'Café Dog Kota Malang',
                'kategori' => 'komersial',
                'judul' => 'Café Dog Kota Malang',
                'deskripsi' => 'Interior café yang nyaman dan modern dengan konsep minimalis yang sempurna untuk meningkatkan brand.',
                'luas' => '180 m²',
                'tahun' => '2023',
            ]);

            Portfolio::create([
                'nama_proyek' => 'Rumah Klasik Elegan',
                'kategori' => 'rumah',
                'judul' => 'Rumah Klasik Elegan',
                'deskripsi' => 'Rumah bergaya klasik dengan sentuhan modern yang memberikan kesan mewah dan nyaman untuk keluarga besar.',
                'luas' => '350 m²',
                'tahun' => '2023',
            ]);

            Portfolio::create([
                'nama_proyek' => 'Swalayan Usaha Baru Premium',
                'kategori' => 'komersial',
                'judul' => 'Swalayan Usaha Baru Premium',
                'deskripsi' => 'Desain toko retail modern dengan layout yang optimal untuk meningkatkan penjualan dan kenyamanan pembeli.',
                'luas' => '2000 m²',
                'tahun' => '2018 - 2020',
            ]);

            Portfolio::create([
                'nama_proyek' => 'Kost & Home Stay',
                'kategori' => 'komersial',
                'judul' => 'Kost & Home Stay',
                'deskripsi' => 'Bangunan kost dan home stay dengan fasilitas lengkap yang nyaman untuk tamu jangka panjang dengan desain modern dan fungsional.',
                'luas' => '800 m²',
                'tahun' => '2021',
            ]);
        }

        // Seed initial layanan (services)
        if (Layanan::count() === 0) {
            Layanan::create([
                'judul' => 'Desain Arsitektur',
                'deskripsi' => 'Desain custom sesuai keinginan Anda dengan mempertimbangkan fungsi, estetika, dan efisiensi energi terbaik. Tim arsitek profesional kami siap mewujudkan visi Anda.',
                'fitur_1' => 'Konsultasi desain gratis',
                'fitur_2' => 'Render 3D berkualitas tinggi',
                'fitur_3' => 'Desain berkelanjutan',
                'icon_color' => 'var(--primary)',
            ]);

            Layanan::create([
                'judul' => 'Konstruksi',
                'deskripsi' => 'Pelaksanaan pembangunan dengan standar kualitas tinggi, material terbaik, dan timeline terjamin sesuai jadwal proyek.',
                'fitur_1' => 'Material berstandar internasional',
                'fitur_2' => 'Supervisi ketat setiap tahap',
                'fitur_3' => 'Garansi struktur bangunan',
                'icon_color' => 'var(--accent)',
            ]);

            Layanan::create([
                'judul' => 'Interior Design',
                'deskripsi' => 'Desain interior yang nyaman, fungsional, dan mencerminkan kepribadian Anda dengan furniture modern dan tren terkini.',
                'fitur_1' => 'Konsep desain personal',
                'fitur_2' => 'Furniture premium pilihan',
                'fitur_3' => 'Smart home integration',
                'icon_color' => '#9b59b6',
            ]);

            Layanan::create([
                'judul' => 'Renovasi',
                'deskripsi' => 'Layanan renovasi rumah, kantor, dan toko dengan hasil memuaskan dan sesuai dengan budget Anda.',
                'fitur_1' => 'Renovasi partial atau total',
                'fitur_2' => 'Harga kompetitif & fleksibel',
                'fitur_3' => 'Minimal downtime operasional',
                'icon_color' => '#27ae60',
            ]);

            Layanan::create([
                'judul' => 'Desain Komersial',
                'deskripsi' => 'Desain swalayan, café, dan toko yang menarik untuk meningkatkan daya tarik dan pengalaman pelanggan bisnis Anda.',
                'fitur_1' => 'Analisis layout optimal',
                'fitur_2' => 'Branding visual profesional',
                'fitur_3' => 'Efisiensi operasional maksimal',
                'icon_color' => '#f39c12',
            ]);

            Layanan::create([
                'judul' => 'Proyek Spesial',
                'deskripsi' => 'Pembangunan masjid, gedung, dan bangunan khusus dengan detail dan presisi tinggi yang sempurna sesuai kebutuhan.',
                'fitur_1' => 'Keahlian khusus per jenis',
                'fitur_2' => 'Detail finishing premium',
                'fitur_3' => 'Sertifikat kelayakan lengkap',
                'icon_color' => '#16a085',
            ]);
        }
    }
}

