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
        Schema::create('ruang_klinik', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_klinik');
            $table->unsignedBigInteger('id_ruang_klinik');
            $table->text('foto');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('id_klinik')->references('id')->on('klinik')->onDelete('cascade');
            $table->foreign('id_ruang_klinik')->references('id')->on('m_ruang_klinik');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ruang_klinik');
    }
};
