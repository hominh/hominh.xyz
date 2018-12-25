<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name',200);
            $table->bigInteger('category_id')->nullable();
            $table->text('intro');
            $table->longText('content');
            $table->text('title');
            $table->text('keyword');
            $table->text('description');
            $table->string('image',200);
            $table->string('slug', 200);
            $table->string('type', 20);
            $table->integer('posttype_id');
            $table->integer('status');
            $table->integer('view');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
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
