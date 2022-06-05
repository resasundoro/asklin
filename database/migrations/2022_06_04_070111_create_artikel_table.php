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
        Schema::create('artikel', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kategori')->nullable();
            $table->unsignedBigInteger('id_tags')->nullable();
            $table->text('cover')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->longText('desc');
            $table->string('keywords')->nullable();
            $table->text('meta_desc')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('id_kategori')->references('id')->on('kategori_artikel')->onDelete('cascade');
            $table->foreign('id_tags')->references('id')->on('tags_artikel')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artikel');
    }
};
