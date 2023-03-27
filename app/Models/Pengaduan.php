<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Notifications\Notifiable;
use illuminate\Foundation\Auth\User as Authenticatable;

class Pengaduan extends Model
{
    use HasFactory;

    use Notifiable;

    protected $table='pengaduan';

    protected $fillable=[
        'Tgl_pengaduan',
        'Name',
        'Isi_laporan',
        'Tgl_tanggapan',
        'Tanggapan',
        'Nama_petugas',
    ];
}
