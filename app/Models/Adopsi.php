<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adopsi extends Model
{
    protected $table = 'adopsi';
    protected $fillable = ['id_user', 'image', 'nama_kucing', 'jenis_kucing', 'alasan_owner', 'medical_note', 'deskripsi', 'kontak'];
}
