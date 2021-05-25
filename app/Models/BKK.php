<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BKK extends Model
{
    use HasFactory;
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'bkks';

    protected $primaryKey = 'bkk_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'bkk_nama',
        'bkk_alamat',
        'bkk_telepon',
        'bkk_daerah',
        'bkk_pencaker',
        'is_actived',
    ];
}
