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
        Schema::create('asuransi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_klinik');
            $table->string('asuransi');
            $table->string('alamat');
            $table->string('id_provinsi');
            $table->string('id_kota');
            $table->string('kontak');
            $table->string('tlf');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('id_klinik')->references('id')->on('klinik');

            $table->foreign('id_provinsi')->references('id')->on('provinces');
            $table->foreign('id_kota')->references('id')->on('regencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asuransi');
    }
};
