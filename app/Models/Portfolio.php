<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = ['nama_proyek', 'kategori', 'judul', 'deskripsi', 'luas', 'tahun', 'gambar'];
}
