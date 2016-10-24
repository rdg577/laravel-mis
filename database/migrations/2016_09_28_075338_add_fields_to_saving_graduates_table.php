<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToSavingGraduatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! (Schema::hasColumn('saving_graduates', 'occupation_id') &&
                Schema::hasColumn('saving_graduates', 'birr') &&
                Schema::hasColumn('saving_graduates', 'cent')))
        {
            Schema::table('saving_graduates', function (Blueprint $table) {
                $table->integer('occupation_id')->unsigned()->after('subsector_id');
                $table->integer('birr')->after('occupation_id');
                $table->integer('cent')->after('birr');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if((Schema::hasColumn('saving_graduates', 'occupation_id') &&
            Schema::hasColumn('saving_graduates', 'birr') &&
            Schema::hasColumn('saving_graduates', 'cent')))
        {
            Schema::table('saving_graduates', function (Blueprint $table) {
                $table->dropColumn('occupation_id');
                $table->dropColumn('birr');
                $table->dropColumn('cent');
            });
        }
    }
}
