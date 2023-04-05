<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtikelTable extends Migration
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
            $table->string('nama_artikel');
            $table->string('seo_artikel');
            $table->string('gambar_artikel');
            $table->date('tanggal');
            $table->text('keterangan_artikel');
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
        Schema::dropIfExists('artikel');
    }
}
