<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 18)->nullable()->unique();
            $table->string('nama');
            $table->string('email')->unique();
            $table->enum('role', ['pegawai', 'admin', 'pimpinan', 'superadmin']);
            $table->string('jns_kelamin')->nullable();
            $table->string('agama')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kota_kab')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('no_handphone')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            $table->string('status_perkawinan')->nullable();
            $table->string('golongan')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('unit_kerja')->nullable();
            $table->string('password');
            $table->string('profile_photo_path', 5120)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('users')->insert([
            'nip' => null,
            'nama' => 'Super Admin',
            'email' => 'su-admin@gmail.com',
            'role' => 'superadmin',
            'jns_kelamin' => null,
            'agama' => null,
            'alamat' => null,
            'no_handphone' => null,
            'tempat_lahir' => null,
            'tanggal_lahir' => null,
            'pendidikan_terakhir' => null,
            'status_perkawinan' => null,
            'golongan' => null,
            'jabatan' => null,
            'unit_kerja' => null,
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
