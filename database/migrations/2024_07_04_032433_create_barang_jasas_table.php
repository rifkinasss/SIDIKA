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
        Schema::create('barang_jasa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nomor_surat')->nullable();
            $table->string('latar_belakang');
            $table->string('tujuan');
            $table->string('deskripsi_kebutuhan');
            $table->string('estimasi_biaya');
            $table->string('jns_belanja');
            $table->string('lainnya');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('durasi');
            $table->string('deskripsi_spesifikasi');


            //Perjanjian SPK
            $table->string('nomor_surat_spk')->nullable();
            $table->string('nama_vendor');
            $table->string('provinsi');
            $table->string('kota');
            $table->date('tgl_mulai_spk');
            $table->date('tgl_selesai_spk');
            $table->string('durasi_spk');
            $table->integer('nilai_kontrak_spk');
            $table->string('uraian_pengadaan');

            //Adendum Kontrak Belanja Modal
            $table->string('nomor_surat_adendum')->nullable();
            $table->string('uraian_adendum');
            $table->date('tgl_mulai_adendum');
            $table->date('tgl_selesai_adendum');
            $table->string('durasi_adendum');
            $table->integer('nilai_kontrak_adendum');
            $table->string('bukti_surat__adendmum');

            //Jaminan Pelaksanaan
            $table->integer('nilai_bank_garansi');
            $table->string('bukti_bank_garansi');
            $table->integer('nilai_surety_bond');
            $table->string('bukti_surety_bond');

            //Jaminan Pengadaan
            $table->integer('nilai_bank_garansi');
            $table->string('bukti_bank_garansi');
            $table->integer('nilai_surety_bond');
            $table->string('bukti_surety_bond');

            //Sumber Dana DPA
            $table->integer('dana_APBN');
            $table->integer('dana_APBD');
            $table->integer('dana_Hibah');
            $table->string('bentuk_pengadaan');
            $table->integer('nilai_DPA');
            $table->string('bukti_DPA');

            // diisi menggunakan metode update
            $table->enum('status', ['Diproses', 'Disetujui', 'Ditolak'])->default('Diproses');

            // SPMK
            $table->string('nomor_spmk')->nullable();
            $table->date('tgl_spmk')->nullable();
            $table->string('bukti_spmk')->nullable();

            // PHO
            $table->string('nomor_pho')->nullable();
            $table->date('tgl_pho')->nullable();
            $table->string('bukti_pho')->nullable();

            // BAST
            $table->string('nomor_bast')->nullable();
            $table->date('tgl_bast')->nullable();
            $table->integer('nilai_bast')->nullable();
            $table->string('bukti_bast')->nullable();

            //FHO
            $table->string('nomor_fho')->nullable();
            $table->date('tgl_fho')->nullable();
            $table->string('bukti_fho')->nullable();

            // SP2D
            $table->date('tgl_sp2d')->nullable();
            $table->string('nomor_sp2d')->nullable();
            $table->integer('nilai_sp2d')->nullable();
            $table->string('bukti_sp2f');

            $table->enum('status_lapor', ['Belum', 'Lapor', 'Disetujui', 'Ditolak'])->default('Belum');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barang_jasa', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
