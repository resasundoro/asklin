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
        Schema::create('surveyor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->text('foto')->nullable();
            $table->string('tlf');
            $table->string('jabatan');
            $table->string('alamat');
            $table->string('id_provinsi');
            $table->string('id_kota');
            $table->string('id_kecamatan');
            $table->string('id_kelurahan');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');

            $table->foreign('id_provinsi')->references('id')->on('provinces');
            $table->foreign('id_kota')->references('id')->on('regencies');
            $table->foreign('id_kecamatan')->references('id')->on('districts');
            $table->foreign('id_kelurahan')->references('id')->on('villages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surveyor');
    }
};
