<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $fillable = ['judul', 'deskripsi', 'fitur_1', 'fitur_2', 'fitur_3', 'icon_color'];
}
