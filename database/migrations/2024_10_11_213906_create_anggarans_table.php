<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anggarans', function (Blueprint $table) {
            $table->id();
            $table->string('anggaran_perjalanan_dinas')->nullable();
            $table->string('anggaran_belanja_modal')->nullable();
            $table->string('anggaran_belanja_barang_jasa')->nullable();
            $table->string('total_anggaran');
            $table->year('tahun_anggaran');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('anggarans', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
