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
        Schema::create('perjalanan_dinas', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat')->nullable();

            // Data Diri
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Keperluan Perjalanan Dinas
            $table->string('jns_perjadin');
            $table->string('keperluan_perjadin');
            $table->string('negara')->default('Indonesia');
            $table->string('provinsi');
            $table->string('kota_kab');

            // Perencanaan Tanggal Perjalanan Dinas
            $table->date('tgl_berangkat');
            $table->date('tgl_kembali');
            $table->integer('jumlah_hari');

            // Rincian Biaya Perjalanan Dinas
            $table->string('uang_harian');
            $table->string('jmlh_uang_harian');
            $table->string('biaya_akomodasi');
            $table->string('biaya_lain');
            $table->string('biaya_tiket_pp');
            $table->string('uang_representasi');
            $table->string('jumlah_biaya');

            // Bukti Surat Tugas Perjalanan Dinas
            $table->string('bukti_surat_tugas', 5120);

            // Status
            $table->enum('status', ['Diproses', 'Disetujui', 'Ditolak'])->default('Diproses');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('perjalanan_dinas', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
