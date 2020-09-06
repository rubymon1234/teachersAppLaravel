<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBasicDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_basic_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name")->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string("subject")->nullable();
            $table->string("educational_qualifications")->nullable();
            $table->string("address")->nullable();
            $table->string("address_house_name")->nullable();
            $table->string("address_house_no")->nullable();
            $table->string("address_landmark")->nullable();
            $table->string("address_village")->nullable();
            $table->string("address_postoffice")->nullable();
            $table->string("address_block")->nullable();
            $table->string("address_panchayath")->nullable();
            $table->string("address_district")->nullable();
            $table->string("address_state")->nullable();
            $table->string("address_pincode")->nullable();
            $table->string("age")->nullable();
            $table->string("date_of_birth")->nullable();
            $table->string("sex")->nullable();
            $table->string("father_or_spouse")->nullable();
            $table->string("father_or_spouse_name")->nullable();
            $table->string("father_or_spouse_relation")->nullable();
            $table->string("father_or_spouse_contact_no")->nullable();
            $table->string("father_or_spouse_email")->nullable();
            $table->string("religion")->nullable();
            $table->string("community")->nullable();     
            $table->tinyInteger('status')->default('1');  
            $table->string("expected_salary")->nullable();  
            $table->integer('country')->unsigned();
            $table->integer('state')->unsigned();
            $table->integer('city')->unsigned();
            $table->integer('panchayath')->unsigned();
            $table->integer('pincode')->unsigned();
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
        Schema::dropIfExists('user_basic_details');
    }
}
