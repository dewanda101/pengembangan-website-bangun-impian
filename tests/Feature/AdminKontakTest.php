<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Kontak;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminKontakTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_and_view_kontak()
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($admin)
            ->post(route('admin.kontak.store'), [
                'nama' => 'Budi',
                'email' => 'budi@example.com',
                'telepon' => '08123456789',
                'jenis_proyek' => 'rumah',
                'pesan' => 'Test pesan',
            ])->assertRedirect(route('admin.kontak.index'));

        $this->assertDatabaseHas('kontaks', ['email' => 'budi@example.com']);
    }
}
