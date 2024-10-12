<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anggaran extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'anggaran_perjalanan_dinas',
        'anggaran_belanja_modal',
        'anggaran_belanja_barang_jasa',
        'total_anggaran',
        'tahun_anggaran'
    ];
}
