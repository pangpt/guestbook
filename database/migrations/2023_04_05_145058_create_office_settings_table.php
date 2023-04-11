<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficeSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('office_settings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_instansi');
            $table->string('phone_instansi');
            $table->string('email_instansi');
            $table->string('alamat_instansi');
            $table->string('website_instansi');
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
        Schema::dropIfExists('office_settings');
    }
}
