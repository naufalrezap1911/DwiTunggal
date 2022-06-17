<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bahanbaku_id')->nullable();
            $table->unsignedBigInteger('produk_dibuat_id')->nullable();
            $table->unsignedBigInteger('produk_terjual_id')->nullable();
            $table->date('tanggal');
            $table->integer('jumlah_pemesanan')->nullable();
            $table->integer('jumlah_produk_dibuat')->nullable();
            $table->integer('jumlah_produk_tersisa')->nullable();
            $table->integer('jumlah_produk_terjual')->nullable();
            $table->timestamps();

            $table->foreign('bahanbaku_id')->references('id')->on('bahan_baku');
            $table->foreign('produk_dibuat_id')->references('id')->on('produk_dibuat');
            $table->foreign('produk_terjual_id')->references('id')->on('produk_terjual');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan');
    }
}
