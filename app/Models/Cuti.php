<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tgl_pengajuan',
        'tgl_awal',
        'tgl_akhir',
        'lama_hari',
        'keterangan',
        'status',
    ];
}