<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShortTermTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('short_term_trainings', function (Blueprint $table) {
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
            $table->integer('no_education_male');
            $table->integer('no_education_female');
            $table->integer('elementary_male');
            $table->integer('elementary_female');
            $table->integer('high_school_male');
            $table->integer('high_school_female');
            $table->integer('preparatory_male');
            $table->integer('preparatory_female');
            $table->integer('higher_education_male');
            $table->integer('higher_education_female');
            $table->integer('mental_male');
            $table->integer('mental_female');
            $table->integer('visual_male');
            $table->integer('visual_female');
            $table->integer('hearing_male');
            $table->integer('hearing_female');
            $table->integer('physical_male');
            $table->integer('physical_female');
            $table->integer('cooperative');
            $table->integer('non_cooperative');
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
        Schema::drop('short_term_trainings');
    }
}
