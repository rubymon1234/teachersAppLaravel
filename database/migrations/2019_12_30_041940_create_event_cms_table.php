<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventCmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_cms', function (Blueprint $table) {
            $table->increments('id');
            $table->string("key_slug")->nullable();
            $table->string("key_value")->nullable();
            $table->string("status")->nullable();
            $table->integer('event_basic_info_id')->unsigned();
            $table->foreign('event_basic_info_id')->references('id')->on('event_basic_infos')->onDelete('cascade');
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
        Schema::dropIfExists('event_cms');
    }
}
