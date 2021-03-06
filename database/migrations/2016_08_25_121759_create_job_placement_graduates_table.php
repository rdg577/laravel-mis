<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobPlacementGraduatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_placement_graduates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('report_date_id')->unsigned();
            $table->integer('institution_id')->unsigned();
            $table->integer('occupation_id')->unsigned();
            $table->integer('regular_level1_male');
            $table->integer('regular_level1_female');
            $table->integer('regular_level2_male');
            $table->integer('regular_level2_female');
            $table->integer('regular_level3_male');
            $table->integer('regular_level3_female');
            $table->integer('regular_level4_male');
            $table->integer('regular_level4_female');
            $table->integer('regular_level5_male');
            $table->integer('regular_level5_female');
            $table->integer('extension_level1_male');
            $table->integer('extension_level1_female');
            $table->integer('extension_level2_male');
            $table->integer('extension_level2_female');
            $table->integer('extension_level3_male');
            $table->integer('extension_level3_female');
            $table->integer('extension_level4_male');
            $table->integer('extension_level4_female');
            $table->integer('extension_level5_male');
            $table->integer('extension_level5_female');
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
        Schema::drop('job_placement_graduates');
    }
}
