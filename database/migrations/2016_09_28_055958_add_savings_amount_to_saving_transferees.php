<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddSavingsAmountToSavingTransferees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! (Schema::hasColumn('saving_transferees', 'birr') && Schema::hasColumn('saving_transferees', 'cent')))
        {
            Schema::table('saving_transferees', function (Blueprint $table) {
                $table->integer('birr')->after('extension_level4_to_level5_female');
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
        if(Schema::hasColumn('saving_transferees', 'birr') && Schema::hasColumn('saving_transferees', 'cent'))
        {
            Schema::table('saving_transferees', function (Blueprint $table) {
                $table->dropColumn('birr');
                $table->dropColumn('cent');
            });
        }
    }
}
