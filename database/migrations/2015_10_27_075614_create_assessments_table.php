<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('report_date_id')->unsigned();
            $table->integer('institution_id')->unsigned();
            $table->integer('occupation_id')->unsigned();
            $table->integer('assessed_regular_male');
            $table->integer('assessed_regular_female');
            $table->integer('assessed_extension_male');
            $table->integer('assessed_extension_female');
            $table->integer('assessed_short_term_male');
            $table->integer('assessed_short_term_female');
            $table->integer('competent_regular_male');
            $table->integer('competent_regular_female');
            $table->integer('competent_extension_male');
            $table->integer('competent_extension_female');
            $table->integer('competent_short_term_male');
            $table->integer('competent_short_term_female');
            $table->timestamps();
            
            $table->foreign('report_date_id')
                    ->references('id')
                    ->on('report_dates')
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
        Schema::drop('assessments');
    }
}
