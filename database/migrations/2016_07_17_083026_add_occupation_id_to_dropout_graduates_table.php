<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOccupationIdToDropoutGraduatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasColumn('dropout_graduates', 'occupation_id'))
            Schema::table('dropout_graduates', function (Blueprint $table) {
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
        if(! Schema::hasColumn('dropout_graduates', 'occupation_id'))
            Schema::table('dropout_graduates', function (Blueprint $table) {
                $table->dropColumn('occupation_id');
            });
    }
}
