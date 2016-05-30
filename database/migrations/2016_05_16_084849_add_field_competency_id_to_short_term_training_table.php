<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldCompetencyIdToShortTermTrainingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('short_term_trainings', function (Blueprint $table) {
            $table->integer('competency_id')->unsigned()->after('occupation_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('short_term_trainings', function (Blueprint $table) {
            $table->dropColumn('competency_id');
        });
    }
}
