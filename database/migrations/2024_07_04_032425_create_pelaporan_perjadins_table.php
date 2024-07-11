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
        Schema::create('pelaporan_perjadins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('perjalanan_dinas_id');
            $table->foreign('perjalanan_dinas_id')->references('id')->on('perjalanan_dinas')->onDelete('cascade');

            // Data Diri
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Pelaporan Rincian Biaya Perjalanan Dinas
            // A. Data Pelaporan Uang Harian
            $table->string('uang_harian');
            $table->string('jmlh_uang_harian');

            // B. Pelaporan Akomodasi Perjalanan Dinas
            $table->string('biaya_akomodasi');
            $table->string('nama_jns_penginapan');
            $table->string('bukti_akomodasi');

            // C. Pelaporan Biaya Lain
            $table->string('biaya_lain');
            $table->string('penggunaan_biaya');
            $table->string('bukti_biaya_lain');

            // D. Data Biaya Tiket Pulang-Pergi
            $table->string('biaya_tiket_pp');

            // E. Pelaporan Data Berangkat Perjalanan Dinas
            $table->date('tgl_berangkat');
            $table->string('jns_transport_brgkt');
            $table->string('nama_transport_brgkt');
            $table->string('nomor_tiket_brgkt');
            $table->string('nomor_kursi_brgkt');
            $table->string('status_brgkt');
            $table->string('biaya_brgkt');
            $table->string('bukti_brgkt');

            // F. Pelaporan Data Kembali Perjalanan Dinas
            $table->date('tgl_kembali');
            $table->string('jns_transport_kmbl');
            $table->string('nama_transport_kmbl');
            $table->string('nomor_tiket_kmbl');
            $table->string('nomor_kursi_kmbl');
            $table->string('status_kmbl');
            $table->string('biaya_kmbl');
            $table->string('bukti_kmbl');

            // G. Pelaporan Uang Representasi
            $table->string('uang_representasi');
            $table->string('bukti_uang_representasi');

            // H. Pelaporan Jumlah Biaya
            $table->string('jumlah_biaya');

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
        Schema::table('pelaporan_perjadin', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
