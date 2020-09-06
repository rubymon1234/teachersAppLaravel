<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSecondaryDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_secondary_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name")->nullable();
            $table->integer('user_basic_id')->unsigned();
            $table->foreign('user_basic_id')->references('id')->on('user_basic_details')->onDelete('cascade');
            $table->string("mobile_number")->nullable();
            $table->string("alt_number")->nullable();
            $table->string("whatsup_number")->nullable();
            $table->string("email")->nullable();
            $table->tinyInteger('physically_challanged')->default('1');  
            $table->string("working_exp")->nullable();  
            $table->tinyInteger('presently_working')->default('1');  
            $table->string("presently_working_description")->nullable();  
            $table->tinyInteger('done_any_course')->default('1');  
            $table->string("done_any_course_description")->nullable();  
            $table->string("intrested_to_work")->nullable();
            $table->tinyInteger('last_working')->default('1');
            $table->string("last_working_name")->nullable();
            $table->string("last_working_address")->nullable();    
            $table->string("last_working_duration")->nullable();   
            $table->string("reason_vacate")->nullable();   
            $table->string("other_facilities")->nullable();  
            $table->string("other_facilities_accomodation")->nullable();  
            $table->string("other_facilities_spouce_stay")->nullable();  
            $table->string("other_facilities_transportation")->nullable();  
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
        Schema::dropIfExists('user_secondary_details');
    }
}
