<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQualificationSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualification_subject', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qualification_id')->unsigned();
            $table->string('subject', 100);
            $table->boolean('is_active')->nullable()->default(true);
            $table->timestamps();
        });

        Schema::table('qualification_subject', function (Blueprint $table) {
            $table->foreign('qualification_id')->references('id')->on('qualification')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qualification_subject');
    }
}
