<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndustryExtension5sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('industry_extension5s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('report_date_id')->unsigned();
            $table->integer('institution_id')->unsigned();
            $table->integer('subsector_id')->unsigned();
            $table->integer('micro');
            $table->integer('small');
            $table->integer('medium');
            $table->string('ie_field');
            $table->integer('level_c_male');
            $table->integer('level_c_female');
            $table->integer('level_b_male');
            $table->integer('level_b_female');
            $table->integer('level_a_male');
            $table->integer('level_a_female');
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
        Schema::drop('industry_extension5s');
    }
}
