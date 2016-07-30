<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOccupationIdToShortTermTraineesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasColumn('short_term_trainees', 'occupation_id'))
            Schema::table('short_term_trainees', function (Blueprint $table) {
                $table->integer('occupation_id')->unsigned()->after('institution_id');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasColumn('short_term_trainees', 'occupation_id'))
            Schema::table('short_term_trainees', function (Blueprint $table) {
                $table->dropColumn('occupation_id');
            });
    }
}
