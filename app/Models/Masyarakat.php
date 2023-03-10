<?php
namespace App\Models;

use illuminate\Database\Eloquen\Factories\HasFactory;
use illuminate\Database\Eloquen\Model;
use illuminate\Notifications\Notifiable;
use illuminate\Foundation\Auth\User as Authenticatable;

class Masyarakat extends Authenticatable
{
    use Notifiable;

    protected $table='Masyarakat';

    protected $fillable=[
        'nik',
        'name',
        'username',
        'telpon',
        'pasword',
        'level',
    ];

    protected $hidden=[
        'pasword',
    ];

    protected $primaryKey='nik';
}
