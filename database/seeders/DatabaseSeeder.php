<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Portfolio;
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
    }
}
