<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCooperativeTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cooperative_trainings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('report_date_id')->unsigned();
            $table->integer('institution_id')->unsigned();
            $table->integer('occupation_id')->unsigned();
            $table->integer('mse_list');
            $table->integer('mse_mou');
            $table->integer('mse_joint_plan');
            $table->integer('mse_training');
            $table->integer('mse_trainers');
            $table->integer('ml_list');
            $table->integer('ml_mou');
            $table->integer('ml_joint_plan');
            $table->integer('ml_training');
            $table->integer('ml_trainers');
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
        Schema::drop('cooperative_trainings');
    }
}
