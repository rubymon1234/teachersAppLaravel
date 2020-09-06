<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePincodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pincode', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pincode', 100);
            $table->integer('panchayath')->unsigned();
            $table->integer('state')->unsigned();
            $table->integer('city')->unsigned();
            $table->integer('country')->unsigned();
            $table->boolean('is_active')->nullable()->default(true);
            $table->timestamps();
        });

        Schema::table('pincode', function (Blueprint $table) {
            $table->foreign('panchayath')->references('id')->on('panchayath')->onDelete('cascade');
            $table->foreign('state')->references('id')->on('state')->onDelete('cascade');
            $table->foreign('city')->references('id')->on('city')->onDelete('cascade');
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
        Schema::dropIfExists('pincode');
    }
}
