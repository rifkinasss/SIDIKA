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
            
            // diisi menggunakan metode update
            $table->enum('status', ['Diproses', 'Disetujui', 'Ditolak'])->default('Diproses');

            /// Pengerjaan Belanja Modal
            //Perjanjian SPK
            $table->string('nomor_surat_spk')->nullable();
            $table->string('nama_vendor')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kota')->nullable();
            $table->date('tgl_mulai_spk')->nullable();
            $table->date('tgl_selesai_spk')->nullable();
            $table->string('durasi_spk')->nullable();
            $table->string('nilai_kontrak_spk')->nullable();
            $table->string('uraian_pengadaan')->nullable();
            $table->text('bukti_spk')->nullable();

            //Adendum Kontrak Belanja Modal
            $table->string('nomor_surat_adendum')->nullable();
            $table->string('uraian_adendum')->nullable();
            $table->date('tgl_mulai_adendum')->nullable();
            $table->date('tgl_selesai_adendum')->nullable();
            $table->string('nilai_kontrak_adendum')->nullable();
            $table->text('bukti_surat_adendum')->nullable();

            //Jaminan Pelaksanaan
            $table->string('nilai_bank_garansi_pelaksanaan')->nullable();
            $table->string('bukti_bank_garansi_pelaksanaan')->nullable();
            $table->string('nilai_surety_bond_pelaksanaan')->nullable();
            $table->string('bukti_surety_bond_pelaksanaan')->nullable();

            //Jaminan Pengadaan
            $table->string('nilai_bank_garansi_pengadaan')->nullable();
            $table->string('bukti_bank_garansi_pengadaan')->nullable();
            $table->string('nilai_surety_bond_pengadaan')->nullable();
            $table->string('bukti_surety_bond_pengadaan')->nullable();

            //Sumber Dana DPA
            $table->string('dana_apbn')->nullable();
            $table->string('dana_apbd')->nullable();
            $table->string('dana_hibah')->nullable();
            $table->string('bentuk_pengadaan')->nullable();
            $table->string('nilai_dpa')->nullable();
            $table->text('bukti_dpa')->nullable();

            $table->integer('persentase')->default(0);
            $table->enum('status_pengerjaan', ['Diproses', 'Disetujui', 'Ditolak'])->default('Diproses');

            /// Laporan Belanja Modal
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
            $table->string('nilai_bast')->nullable();
            $table->string('bukti_bast')->nullable();

            //FHO
            $table->string('nomor_fho')->nullable();
            $table->date('tgl_fho')->nullable();
            $table->string('bukti_fho')->nullable();

            // SP2D
            $table->date('tgl_sp2d')->nullable();
            $table->string('nomor_sp2d')->nullable();
            $table->string('nilai_sp2d')->nullable();
            $table->string('bukti_sp2f')->nullable();
            
            $table->integer('persentase_lapor')->default(0);
            $table->enum('status_lapor', ['Diproses', 'Disetujui', 'Ditolak'])->default('Diproses');
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
