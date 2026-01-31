<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Layanan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminLayananTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_layanan()
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($admin)
            ->post(route('admin.layanan.store'), [
                'judul' => 'Desain Arsitektur',
                'deskripsi' => 'Deskripsi layanan',
                'fitur_1' => 'Fitur A',
                'fitur_2' => 'Fitur B',
                'fitur_3' => 'Fitur C',
            ])->assertRedirect(route('admin.layanan.index'));

        $this->assertDatabaseHas('layanans', ['judul' => 'Desain Arsitektur']);
    }
}
