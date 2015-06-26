<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelServer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Buat Table Server
        Schema::create('server', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid', 36);
            $table->integer('instansi_id')->unsigned();
            $table->foreign('instansi_id')
                  ->references('id')->on('instansi')
                  ->onDelete('cascade');
            $table->string('name')->index();
            $table->text('address');
            $table->text('token');
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
        Schema::drop('server');
    }
}
