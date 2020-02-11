<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentReplaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_replays', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();;
            $table->biginteger('comment_id')->unsigned();;
            $table->integer('user_id');
            $table->string('content');
            $table->string('status')->default(0);
            $table->timestamps();
        });
        Schema::table('comment_replays', function($table) {
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_replays');
    }
}
