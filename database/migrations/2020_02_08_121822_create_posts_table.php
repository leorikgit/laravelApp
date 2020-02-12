<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->integer('category_id');
            $table->bigInteger('image_id')->unsigned();
            $table->string('title');
            $table->string('body');
            $table->string('slug');
            $table->timestamps();
        });
            Schema::table('posts', function($table) {
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            });
     //       $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->change();;
          //  $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
