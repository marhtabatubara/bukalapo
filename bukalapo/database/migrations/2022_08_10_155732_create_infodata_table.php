<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfodataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infodata', function (Blueprint $table) {
            $table->id();
            $table->string('nama_infodata');
            $table->string('seo_infodata');
            $table->string('gambar_infodata');
            $table->date('tanggal');
            $table->text('keterangan_infodata');
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
        Schema::dropIfExists('infodata');
    }
}
