<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDropoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dropouts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('report_date_id')->unsigned();
            $table->integer('institution_id')->unsigned();
            $table->integer('occupation_id')->unsigned();
            $table->integer('department');
            $table->string('completed_level');
            $table->integer('regular_male');
            $table->integer('regular_female');
            $table->integer('extension_male');
            $table->integer('extension_female');
            $table->integer('short_term_male');
            $table->integer('short_term_female');
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
        Schema::drop('dropouts');
    }
}
