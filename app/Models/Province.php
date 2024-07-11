<?php

/*
 * This file is part of the IndoRegion package.
 *
 * (c) Azis Hapidin <azishapidin.com | azishapidin@gmail.com>
 *
 */

namespace App\Models;

use App\Models\Regency;
use App\Models\Pegawai\PerjalananDinas;
use Illuminate\Database\Eloquent\Model;
use AzisHapidin\IndoRegion\Traits\ProvinceTrait;

/**
 * Province Model.
 */
class Province extends Model
{
    use ProvinceTrait;
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'provinces';

    /**
     * Province has many regencies.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function regencies()
    {
        return $this->hasMany(Regency::class);
    }

    public function perjalananDinas()
    {
        return $this->belongsTo(PerjalananDinas::class, 'province_id');
    }
}
