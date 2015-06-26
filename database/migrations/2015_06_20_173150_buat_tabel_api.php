<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelApi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Buat Table API
        Schema::create('api', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid', 36);
            $table->integer('server_id')->unsigned();
            $table->foreign('server_id')
                  ->references('id')->on('server')
                  ->onDelete('cascade');
            $table->string('name');
            $table->string('type');
            $table->text('address');
            $table->dateTime('last_modified');
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
        // Hapus Table API
        Schema::drop('api');
    }
}
