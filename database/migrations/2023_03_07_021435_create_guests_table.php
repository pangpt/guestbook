<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('nomor_telepon')->nullable();
            $table->string('instansi')->nullable();
            $table->string('tujuan_kunjungan');
            $table->string('kategori');
            $table->date('tanggal_kunjungan');
            $table->time('waktu_kunjungan');
            $table->text('catatan')->nullable();
            $table->string('foto_tamu')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guests');
    }
}
