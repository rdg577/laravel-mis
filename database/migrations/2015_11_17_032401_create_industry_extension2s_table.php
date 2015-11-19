<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndustryExtension2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('industry_extension2s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('report_date_id')->unsigned();
            $table->integer('institution_id')->unsigned();
            $table->integer('subsector_id')->unsigned();
            $table->integer('starter_enterprise');
            $table->integer('starter_mse_operator_male');
            $table->integer('starter_mse_operator_female');
            $table->integer('starter_mse_operator_supported_male');
            $table->integer('starter_mse_operator_supported_female');
            $table->integer('advance_enterprise');
            $table->integer('advance_mse_operator_male');
            $table->integer('advance_mse_operator_female');
            $table->integer('advance_mse_operator_supported_male');
            $table->integer('advance_mse_operator_supported_female');
            $table->integer('competent_enterprise');
            $table->integer('competent_mse_operator_male');
            $table->integer('competent_mse_operator_female');
            $table->integer('competent_mse_operator_supported_male');
            $table->integer('competent_mse_operator_supported_female');
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
        Schema::drop('industry_extension2s');
    }
}
