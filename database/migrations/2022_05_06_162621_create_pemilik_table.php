<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemilikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemilik', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('provinsi_id')->nullable();
            $table->unsignedBigInteger('kabupaten_id')->nullable();
            $table->string('nama_pemilik');
            $table->string('no_telp')->nullable();
            $table->text('alamat')->nullable();
            $table->string('email');
            $table->string('password');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('provinsi_id')->references('id')->on('provinsi');
            $table->foreign('kabupaten_id')->references('id')->on('kabupaten');
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
    }
}
