<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBreakingnewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breakingnews', function (Blueprint $table) {
            $table->increments('breakingnew_id');
            $table->text('breaking_news_name')->nullable();
            $table->tinyInteger('ber_status', false, 2)->nullable();
            $table->date('ber_cur_date')->nullable();
            $table->integer('ber_user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('breakingnews');
    }
}
