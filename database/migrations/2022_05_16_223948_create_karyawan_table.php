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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_klinik');
            $table->string('nama');
            $table->unsignedBigInteger('id_kategori');
            $table->string('npa_idi')->nullable();
            $table->string('no_str')->nullable();
            $table->string('no_sip')->nullable();
            $table->date('tgl_akhir_sip')->nullable();
            $table->string('no_tlf')->nullable();
            $table->string('no_sib_sik')->nullable();
            $table->date('tgl_akhir_str')->nullable();
            $table->text('ket_sib_sik')->nullable();
            $table->string('farmasi_apoteker')->nullable();
            $table->string('ijazah_terakhir')->nullable();
            $table->string('jabatan')->nullable();
            $table->text('foto_sip')->nullable();
            $table->text('foto_str')->nullable();
            $table->text('foto_ijazah')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('id_klinik')->references('id')->on('klinik')->onDelete('cascade');

            $table->foreign('id_kategori')->references('id')->on('m_karyawan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawan');
    }
};
