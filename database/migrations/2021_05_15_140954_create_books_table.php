<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->longText('description');
            $table->string('image_url');
            $table->date('published_at');
            $table->bigInteger('author_id')->unsigned();
            $table->bigInteger('genre_id')->unsigned();
            $table->bigInteger('publisher_id')->unsigned();
            $table->integer('total_copies');
            $table->timestamps();


            $table->foreign('author_id')->references('id')->on('authors')->onUpdate('cascade');
            $table->foreign('genre_id')->references('id')->on('genres')->onUpdate('cascade');
            $table->foreign('publisher_id')->references('id')->on('publishers')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
