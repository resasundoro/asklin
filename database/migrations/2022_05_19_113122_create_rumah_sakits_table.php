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
        Schema::create('rumah_sakits', function (Blueprint $table) {
            $table->id();
            $table->string('id_klinik');
            $table->string('rs');
            $table->string('alamat');
            $table->string('id_provinsi');
            $table->string('id_kota');
            $table->string('tlf');
            $table->string('jarak');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rumah_sakits');
    }
};