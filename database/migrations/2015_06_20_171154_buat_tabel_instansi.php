<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelInstansi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Buat Table Instansi
        Schema::create('instansi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid', 36);
            $table->string('name');
            $table->string('alias');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Hapus Table Instansi
        Schema::drop('instansi');
    }
}
