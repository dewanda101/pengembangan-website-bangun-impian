<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Portfolio;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminPortfolioTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_portfolio_without_image()
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($admin)
            ->post(route('admin.portfolio.store'), [
                'nama_proyek' => 'Rumah Minimalis',
                'kategori' => 'rumah',
                'judul' => 'Rumah Minimalis Modern',
                'deskripsi' => 'Deskripsi proyek',
                'luas' => '120 m2',
                'tahun' => '2025',
            ])->assertRedirect(route('admin.portfolio.index'));

        $this->assertDatabaseHas('portfolios', ['nama_proyek' => 'Rumah Minimalis']);
    }
}
