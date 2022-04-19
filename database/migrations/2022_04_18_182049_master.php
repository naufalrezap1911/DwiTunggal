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
        // Schema::create('pemilik', function (Blueprint $table) {
        //     $table->increments('id_pemilik');
        //     $table->string('nama');
        //     $table->string('no_telp');
        //     $table->string('email');
        //     $table->string('alamat');
        //     $table->string('password');
        // });
        // Schema::create('pekerja', function (Blueprint $table) {
        //     $table->increments('id_pekerja');
        //     $table->string('nama');
        //     $table->string('no_telp');
        //     $table->string('email');
        //     $table->string('alamat');
        //     $table->string('password');
        // });
        Schema::create('bahanbaku', function (Blueprint $table) {
            $table->increments('id_bahanbaku');
            $table->string('tanggal');
            $table->string('nama');
            $table->string('jumlah');
            $table->string('harga');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('pemilik');
        // Schema::dropIfExists('pekerja');
        Schema::dropIfExists('bahanbaku');
    }
}
