<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarouselTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carousel', function (Blueprint $table) {
            $table->id();
            $table->string('nama_carousel');
            $table->string('seo_carousel');
            $table->string('gambar_carousel');
            $table->date('tanggal');
            $table->text('keterangan_carousel');
            $table->unsignedBigInteger('id_postingan');
            $table->foreign('id_postingan')->references('id')->on('postingan')->onDelete('cascade');
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
        Schema::dropIfExists('carousel');
    }
}
