<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Buat Table Data
        Schema::create('data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid', 36);
            $table->integer('api_id')->unsigned();
            $table->foreign('api_id')
                  ->references('id')->on('api')
                  ->onDelete('cascade');
            $table->string('document_title')->index();
            $table->text('writer')->nullable();
            $table->text('description')->nullable();
            $table->text('publisher')->nullable();
            $table->text('year_published')->nullable();
            $table->text('file_type')->nullable();
            $table->text('pages')->nullable();
            $table->text('isbn')->nullable();
            $table->text('document_size')->nullable();
            $table->text('cover_image')->nullable();
            $table->text('address');
            $table->string('availability');
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
        // Hapus Table data
        Schema::drop('data');
    }
}
