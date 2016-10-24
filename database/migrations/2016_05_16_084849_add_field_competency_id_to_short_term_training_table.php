<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddFieldCompetencyIdToShortTermTrainingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasColumn('short_term_trainings', 'competency_id'))
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
        if(Schema::hasColumn('short_term_trainings', 'competency_id'))
            Schema::table('short_term_trainings', function (Blueprint $table) {
                $table->dropColumn('competency_id');
            });
    }
}
