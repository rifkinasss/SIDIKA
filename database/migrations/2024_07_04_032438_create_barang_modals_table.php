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
        Schema::create('barang_modal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nomor_surat')->nullable();
            $table->string('latar_belakang');
            $table->string('tujuan');
            $table->string('deskripsi_kebutuhan');
            $table->string('estimasi_biaya');
            $table->string('jns_belanja');
            $table->string('lainnya')->nullable();
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('durasi');
            $table->text('deskripsi_spesifikasi');


            //Perjanjian SPK
            $table->string('nomor_surat_spk')->nullable();
            $table->string('nama_vendor')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kota')->nullable();
            $table->date('tgl_mulai_spk')->nullable();
            $table->date('tgl_selesai_spk')->nullable();
            $table->string('durasi_spk')->nullable();
            $table->integer('nilai_kontrak_spk')->nullable();
            $table->string('uraian_pengadaan')->nullable();

            //Adendum Kontrak Belanja Modal
            $table->string('nomor_surat_adendum')->nullable();
            $table->string('uraian_adendum')->nullable();
            $table->date('tgl_mulai_adendum')->nullable();
            $table->date('tgl_selesai_adendum')->nullable();
            $table->string('durasi_adendum')->nullable();
            $table->integer('nilai_kontrak_adendum')->nullable();
            $table->string('bukti_surat__adendmum')->nullable();

            //Jaminan Pelaksanaan
            $table->integer('nilai_bank_garansi_pelaksanaan')->nullable();
            $table->string('bukti_bank_garansi_pelaksanaan')->nullable();
            $table->integer('nilai_surety_bond_pelaksanaan')->nullable();
            $table->string('bukti_surety_bond_pelaksanaan')->nullable();

            //Jaminan Pengadaan
            $table->integer('nilai_bank_garansi_pengadaan')->nullable();
            $table->string('bukti_bank_garansi_pengadaan')->nullable();
            $table->integer('nilai_surety_bond_pengadaan')->nullable();
            $table->string('bukti_surety_bond_pengadaan')->nullable();

            //Sumber Dana DPA
            $table->integer('dana_APBN')->nullable();
            $table->integer('dana_APBD')->nullable();
            $table->integer('dana_Hibah')->nullable();
            $table->string('bentuk_pengadaan')->nullable();
            $table->integer('nilai_DPA')->nullable();
            $table->string('bukti_DPA')->nullable();

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
            $table->string('bukti_sp2f')->nullable();

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
        Schema::table('barang_modal', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
