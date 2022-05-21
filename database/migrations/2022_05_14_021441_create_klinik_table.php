<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klinik', function (Blueprint $table) {
            $table->id();
            $table->string('no_anggota')->nullable();
            $table->string('nama_klinik')->nullable();
            $table->text('logo_klinik')->nullable();
            $table->string('no_ijin_klinik')->nullable();
            $table->date('tgl_terbit_ijin_klinik')->nullable();
            $table->date('masa_berlaku_ijin_klinik')->nullable();
            $table->string('nama_pendaftar')->nullable();
            $table->string('email_pendaftar')->nullable();
            $table->string('tlf_pendaftar')->nullable();
            $table->enum('status_pendaftar', ['Pemilik', 'Penanggung Jawab', 'Pengelola', 'Pemilik & Penanggung Jawab', 'Pengelola & Penanggung Jawab'])->nullable();
            $table->string('nama_pemilik')->nullable();
            $table->enum('jenis_klinik', ['Utama', 'Pratama'])->nullable();
            $table->enum('status_kepemilikan_klinik', ['Perorangan', 'Badan Usaha', 'Badan Hukum'])->nullable();
            $table->string('tlf_klinik')->nullable();
            $table->string('alamat_klinik')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('bentuk_badan_usaha')->nullable();
            $table->string('bentuk_badan_hukum')->nullable();
            $table->string('nama_badan')->nullable();
            $table->unsignedBigInteger('kriteria')->nullable();
            $table->unsignedBigInteger('fasilitas')->nullable();
            $table->unsignedBigInteger('layanan')->nullable();
            $table->enum('status', ['Waiting','Process','Approved','Create Dokter','Selesai Input','Data Tidak Sesuai','Ditolak Pusat','Kirim Konfirmasi Pembayaran'])->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('kelurahan')->references('id')->on('villages');
            $table->foreign('kecamatan')->references('id')->on('districts');
            $table->foreign('kota')->references('id')->on('regencies');
            $table->foreign('provinsi')->references('id')->on('provinces');

            $table->foreign('kriteria')->references('id')->on('m_kriteria_klinik');
            $table->foreign('fasilitas')->references('id')->on('m_fasilitas_klinik');
            $table->foreign('layanan')->references('id')->on('m_layanan_klinik');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('klinik');
    }
};
