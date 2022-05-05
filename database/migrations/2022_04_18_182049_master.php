<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Master extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemilik', function (Blueprint $table) {
            $table->increments('id_pemilik');
            $table->string('nama');
            $table->string('no_telp');
            $table->string('email');
            $table->string('alamat');
            $table->string('password');
        });
        Schema::create('pekerja', function (Blueprint $table) {
            $table->increments('id_pekerja');
            $table->string('nama');
            $table->string('no_telp');
            $table->string('email');
            $table->string('alamat');
            $table->string('password');
        });
        Schema::create('bahanbaku', function (Blueprint $table) {
            $table->increments('id_bahanbaku');
            $table->string('tanggal');
            $table->string('nama');
            $table->string('jumlah');
            $table->string('harga');
        });

        Schema::create('produkterjual', function(Blueprint $table){
            $table->increments('id_produkterjual');
            $table->string('tanggal');
            $table->string('nama');
            $table->string('jumlah_terjual');
            $table->string('harga');
        });

        Schema::create('keuangan', function(Blueprint $table){
            $table->increments('id_keuangan');
            $table->string('tanggal');
            $table->string('pengeluaran');
            $table->string('pendapatan');
        });

        Schema::create('produkdibuat', function(Blueprint $table){
            $table->increments('id_produkdibuat');
            $table->string('tanggal');
            $table->string('nama');
            $table->string('jumlah_dibutuhkan');
            $table->string("jumlah_produk");
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemilik');
        Schema::dropIfExists('pekerja');
        Schema::dropIfExists('bahanbaku');
        Schema::dropIfExists('produkterjual');
        Schema::dropIfExists('keuangan');
        Schema::dropIfExists('produkdibuat');
    }
}
