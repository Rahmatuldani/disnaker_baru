<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pencaker extends Model
{
    use HasFactory;
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'pencakers';

    protected $primaryKey = 'pencaker_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'daerah',
        'nama',
        'bkk_id',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'umur',
        'alamat',
        'jk',
        'agama',
        'status_nikah',
        'pekerjaan',
        'tinggi_badan',
        'telepon',
        'sekolah',
        'jurusan',
        'pelatihan',
        'status_kerja',
        'masuk',
        'is_actived',
    ];
}
