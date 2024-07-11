<?php

namespace App\Models\Pegawai;

use App\Models\User;
use App\Models\Regency;
use App\Models\Province;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pegawai\PelaporanPerjadin;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PerjalananDinas extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'perjalanan_dinas';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pelaporanPerjadin()
    {
        return $this->hasOne(PelaporanPerjadin::class, 'perjalanan_dinas_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
    public function regency()
    {
        return $this->belongsTo(Regency::class, 'regency_id');
    }
}
