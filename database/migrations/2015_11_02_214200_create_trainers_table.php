<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('report_date_id')->unsigned();
            $table->integer('institution_id')->unsigned();
            $table->integer('occupation_id')->unsigned();
            $table->integer('full_time_male');
            $table->integer('full_time_female');
            $table->integer('part_time_male');
            $table->integer('part_time_female');
            $table->integer('ethiopian_male');
            $table->integer('ethiopian_female');
            $table->integer('non_ethiopian_male');
            $table->integer('non_ethiopian_female');
            $table->integer('core_male');
            $table->integer('core_female');
            $table->integer('took_tm_male');
            $table->integer('took_tm_female');
            $table->string('remarks');
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
        Schema::drop('trainers');
    }
}
