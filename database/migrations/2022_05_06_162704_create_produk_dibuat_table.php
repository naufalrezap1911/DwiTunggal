<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukDibuatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_dibuat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bahanbaku_id');
            $table->date('tanggal');
            $table->enum('nama_produk',['Singkong','Sukun','Pisang','Ketela','Talas']);
            $table->integer('jumlah_bahanbaku');
            $table->integer('jumlah_produk_dibuat');
            $table->timestamps();

            $table->foreign('bahanbaku_id')->references('id')->on('bahan_baku');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk_dibuat');
    }
}
