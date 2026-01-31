<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $fillable = ['nama', 'email', 'telepon', 'jenis_proyek', 'pesan', 'status'];
}
