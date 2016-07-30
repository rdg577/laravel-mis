<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOccupationIdToTransfereesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasColumn('transferees', 'occupation_id'))
            Schema::table('transferees', function (Blueprint $table) {
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
        if(! Schema::hasColumn('transferees', 'occupation_id'))
            Schema::table('transferees', function (Blueprint $table) {
                $table->dropColumn('occupation_id');
            });
    }
}
