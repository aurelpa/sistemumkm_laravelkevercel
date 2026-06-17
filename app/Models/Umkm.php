<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Umkm extends Model
{
    use HasFactory;

    protected $table = 'umkm';

    protected $fillable = [
        'nama_usaha',
        'nama_pemilik',
        'jenis_usaha',
        'alamat',
        'nomor_telepon',
        'email',
        'tahun_berdiri',
        'jumlah_karyawan',
        'deskripsi_usaha',
    ];

    protected $casts = [
        'tahun_berdiri' => 'integer',
        'jumlah_karyawan' => 'integer',
    ];
}
