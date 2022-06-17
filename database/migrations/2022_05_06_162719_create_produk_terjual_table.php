<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTerjualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_terjual', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->enum('nama_produk',['Singkong','Sukun','Pisang','Ketela','Talas']);
            $table->integer('jumlah_produk');
            $table->integer('harga_produk');
            $table->integer('total');
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
        Schema::dropIfExists('produk_terjual');
    }
}
