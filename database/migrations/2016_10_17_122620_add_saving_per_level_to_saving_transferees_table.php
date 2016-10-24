<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddSavingPerLevelToSavingTransfereesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasColumn('saving_transferees', 'birr') && Schema::hasColumn('saving_transferees', 'cent'))
        {
            Schema::table('saving_transferees', function (Blueprint $table) {
                $table->dropColumn('birr');
                $table->dropColumn('cent');
            });
        }

        if(!(Schema::hasColumn('saving_transferees', 'regular_level1_to_level2_saving') &&
             Schema::hasColumn('saving_transferees', 'regular_level2_to_level3_saving') &&
             Schema::hasColumn('saving_transferees', 'regular_level3_to_level4_saving') &&
             Schema::hasColumn('saving_transferees', 'regular_level4_to_level5_saving') &&

             Schema::hasColumn('saving_transferees', 'extension_level1_to_level2_saving') &&
             Schema::hasColumn('saving_transferees', 'extension_level2_to_level3_saving') &&
             Schema::hasColumn('saving_transferees', 'extension_level3_to_level4_saving') &&
             Schema::hasColumn('saving_transferees', 'extension_level4_to_level5_saving')))
        {
            Schema::table('saving_transferees', function (Blueprint $table) {
                $table->double('regular_level1_to_level2_saving')->after('regular_level1_to_level2_female');
                $table->double('regular_level2_to_level3_saving')->after('regular_level2_to_level3_female');
                $table->double('regular_level3_to_level4_saving')->after('regular_level3_to_level4_female');
                $table->double('regular_level4_to_level5_saving')->after('regular_level4_to_level5_female');

                $table->double('extension_level1_to_level2_saving')->after('extension_level1_to_level2_female');
                $table->double('extension_level2_to_level3_saving')->after('extension_level2_to_level3_female');
                $table->double('extension_level3_to_level4_saving')->after('extension_level3_to_level4_female');
                $table->double('extension_level4_to_level5_saving')->after('extension_level4_to_level5_female');
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
        if(! (Schema::hasColumn('saving_transferees', 'birr') && Schema::hasColumn('saving_transferees', 'cent')))
        {
            Schema::table('saving_transferees', function (Blueprint $table) {
                $table->integer('birr')->after('extension_level4_to_level5_female');
                $table->integer('cent')->after('birr');
            });
        }

        if((Schema::hasColumn('saving_transferees', 'regular_level1_to_level2_saving') &&
            Schema::hasColumn('saving_transferees', 'regular_level2_to_level3_saving') &&
            Schema::hasColumn('saving_transferees', 'regular_level3_to_level4_saving') &&
            Schema::hasColumn('saving_transferees', 'regular_level4_to_level5_saving') &&

            Schema::hasColumn('saving_transferees', 'extension_level1_to_level2_saving') &&
            Schema::hasColumn('saving_transferees', 'extension_level2_to_level3_saving') &&
            Schema::hasColumn('saving_transferees', 'extension_level3_to_level4_saving') &&
            Schema::hasColumn('saving_transferees', 'extension_level4_to_level5_saving')))
        {
            Schema::table('saving_transferees', function (Blueprint $table) {
                $table->dropColumn('regular_level1_to_level2_saving');
                $table->dropColumn('regular_level2_to_level3_saving');
                $table->dropColumn('regular_level3_to_level4_saving');
                $table->dropColumn('regular_level4_to_level5_saving');

                $table->dropColumn('extension_level1_to_level2_saving');
                $table->dropColumn('extension_level2_to_level3_saving');
                $table->dropColumn('extension_level3_to_level4_saving');
                $table->dropColumn('extension_level4_to_level5_saving');
            });

        }
    }
}
