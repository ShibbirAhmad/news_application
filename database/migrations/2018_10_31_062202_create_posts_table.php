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
            $table->increments('post_id');
            $table->string('post_title')->nullable();
            $table->integer('category_id', false, 5)->nullable();
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->string('post_image')->nullable();
            $table->string('position')->nullable();
            $table->string('popular_news')->nullable();
            $table->string('popular_news')->nullable();
            $table->string('latest_news')->nullable();
            $table->date('post_cur_date')->nullable();
            $table->integer('post_user_id');
            
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
