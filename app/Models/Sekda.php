<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekda extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'noHp',
        'nip',
        'statusPegawai',
        'alamatAsalInstansi',
        'bidang',
        'jabatan',
        'keperluan',
        'tujuan',
    ];
}
