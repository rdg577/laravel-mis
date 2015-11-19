<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndustryExtension4sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('industry_extension4s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('report_date_id')->unsigned();
            $table->integer('institution_id')->unsigned();
            $table->integer('subsector_id')->unsigned();
            $table->integer('short_term_male');
            $table->integer('short_term_female');
            $table->integer('level1n2_male');
            $table->integer('level1n2_female');
            $table->integer('level3n4_male');
            $table->integer('level3n4_female');
            $table->integer('operator_male');
            $table->integer('operator_female');
            $table->integer('mse');
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
        Schema::drop('industry_extension4s');
    }
}
