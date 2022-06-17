<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBahanBakuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bahan_baku', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pekerja_id');
            $table->date('tanggal');
            $table->enum('nama_bahanbaku',['Singkong','Sukun','Pisang','Ketela','Talas']);
            $table->integer('jumlah_bahanbaku');
            $table->integer('harga_bahanbaku');
            $table->timestamps();

            $table->foreign('pekerja_id')->references('id')->on('pekerja');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bahan_baku');
    }
}
