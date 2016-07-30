<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShortTermTraineesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('short_term_trainees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('report_date_id')->unsigned();
            $table->integer('institution_id')->unsigned();
            $table->integer('occupation_id');
            $table->integer('registered_male');
            $table->integer('registered_female');
            $table->integer('started_training_male');
            $table->integer('started_training_female');
            $table->integer('completed_training_male');
            $table->integer('completed_training_female');
            $table->integer('sent_assessment_male');
            $table->integer('sent_assessment_female');
            $table->integer('assessed_male');
            $table->integer('assessed_female');
            $table->integer('competent_male');
            $table->integer('competent_female');
            $table->timestamps();

            $table->foreign('report_date_id')
                ->references('id')->on('report_dates')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('short_term_trainees');
    }
}
