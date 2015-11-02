<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormalTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formal_trainings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('report_date_id')->unsigned();
            $table->integer('institution_id')->unsigned();
            $table->integer('occupation_id')->unsigned();
            $table->date('course_started');
            $table->date('course_ended');
            $table->integer('below17_male');
            $table->integer('below17_female');
            $table->integer('from17to19_male');
            $table->integer('from17to19_female');
            $table->integer('above19_male');
            $table->integer('above19_female');
            $table->integer('regular_male');
            $table->integer('regular_female');
            $table->integer('extension_male');
            $table->integer('extension_female');
            $table->integer('from_grade10_male');
            $table->integer('from_grade10_female');
            $table->integer('from_grade11_male');
            $table->integer('from_grade11_female');
            $table->integer('from_grade12_male');
            $table->integer('from_grade12_female');
            $table->integer('beyond_grade12_male');
            $table->integer('beyond_grade12_female');
            $table->integer('mental_male');
            $table->integer('mental_female');
            $table->integer('visual_male');
            $table->integer('visual_female');
            $table->integer('hearing_male');
            $table->integer('hearing_female');
            $table->integer('physical_male');
            $table->integer('physical_female');
            $table->integer('cooperative_male');
            $table->integer('cooperative_female');
            $table->integer('noncooperative_male');
            $table->integer('noncooperative_female');
            $table->string('remarks');
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
        Schema::drop('formal_trainings');
    }
}
