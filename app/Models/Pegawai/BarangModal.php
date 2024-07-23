<?php

namespace App\Models\Pegawai;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class BarangModal extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'barang_modal';
    protected $guarded = ['id'];

    protected $casts = [
        'bukti_spk' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
