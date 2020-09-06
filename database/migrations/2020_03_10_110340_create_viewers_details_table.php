<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewersDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viewers_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('viewed_by')->unsigned();
            $table->foreign('viewed_by')->references('id')->on('users')->onDelete('cascade');
            $table->integer('profile_id')->unsigned();
            $table->foreign('profile_id')->references('id')->on('users')->onDelete('cascade');
            $table->tinyInteger('contacted')->default('0');
            $table->tinyInteger('mail_status')->default('0');
            $table->tinyInteger('view_count')->default('0');
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
        Schema::dropIfExists('viewers_details');
    }
}
