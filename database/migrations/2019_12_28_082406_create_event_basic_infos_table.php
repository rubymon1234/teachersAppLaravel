<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventBasicInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_basic_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('event_start_date')->nullable();
            $table->date('event_end_date')->nullable();
            $table->string('rate')->nullable();
            $table->tinyInteger('status')->default('1');
            $table->integer('event_id')->unsigned();
            $table->foreign('event_id')->references('id')->on('event_categories')->onDelete('cascade');
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
        Schema::dropIfExists('event_basic_infos');
    }
}
