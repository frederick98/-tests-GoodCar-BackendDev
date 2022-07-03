<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelDataKecamatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // create table
        Schema::create('m_kecamatan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('kelurahan');
            $table->string('nama');
            $table->integer('status')->default(1);
            $table->timestamp('created_time')->nullable();
            $table->string('created_by', 45)->nullable();
            $table->timestamp('updated_time')->nullable();
            $table->string('updated_by', 45)->nullable();
            $table->timestamp('deleted_time')->nullable();
            $table->string('deleted_by', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // drop existing table
        Schema::dropIfExists('data_kecamatan');
    }
}
