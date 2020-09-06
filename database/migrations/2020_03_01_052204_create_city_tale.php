<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityTale extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city', function (Blueprint $table) {
            $table->increments('id');
            $table->string('city', 100);
            $table->integer('state')->unsigned();
            $table->integer('country')->unsigned();
            $table->boolean('is_active')->nullable()->default(true);
            $table->timestamps();
        });

        Schema::table('city', function (Blueprint $table) {
            $table->foreign('state')->references('id')->on('state')->onDelete('cascade');
            $table->foreign('country')->references('id')->on('country')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city');
    }
}
