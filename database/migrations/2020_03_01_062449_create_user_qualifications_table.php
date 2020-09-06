<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_qualifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user')->unsigned();
            $table->foreign('user')->references('id')->on('users')->onDelete('cascade');
            $table->string('qualification', 100);
            $table->string('year_passout', 5);
            $table->string('subject', 100);
            $table->boolean('is_active')->nullable()->default(true);
            $table->timestamps();
        });

        Schema::table('user_basic_details', function (Blueprint $table) {
            $table->foreign('country')->references('id')->on('country')->onDelete('cascade');
            $table->foreign('state')->references('id')->on('state')->onDelete('cascade');
            $table->foreign('city')->references('id')->on('city')->onDelete('cascade');
            $table->foreign('panchayath')->references('id')->on('panchayath')->onDelete('cascade');
            $table->foreign('pincode')->references('id')->on('pincode')->onDelete('cascade');
            $table->string('userImages')->nullable();
        });

        Schema::table('user_secondary_details', function (Blueprint $table) {
            $table->string('landPhone', 50);
            $table->string('marital_status', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_qualifications');
    }
}
