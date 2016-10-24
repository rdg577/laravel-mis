<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOccupationIdToSavingTransfereesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasColumn('saving_transferees', 'occupation_id'))
            Schema::table('saving_transferees', function (Blueprint $table) {
                $table->integer('occupation_id')->unsigned()->after('subsector_id');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasColumn('saving_transferees', 'occupation_id'))
            Schema::table('saving_transferees', function (Blueprint $table) {
                $table->dropColumn('occupation_id');
            });
    }
}
