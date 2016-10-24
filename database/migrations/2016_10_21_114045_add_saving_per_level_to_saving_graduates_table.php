<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSavingPerLevelToSavingGraduatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasColumn('saving_graduates', 'birr') && Schema::hasColumn('saving_graduates', 'cent'))
        {
            Schema::table('saving_graduates', function (Blueprint $table) {
                $table->dropColumn('birr');
                $table->dropColumn('cent');
            });
        }

        if(!(Schema::hasColumn('saving_graduates', 'regular_level1_saving') &&
            Schema::hasColumn('saving_graduates', 'regular_level2_saving') &&
            Schema::hasColumn('saving_graduates', 'regular_level3_saving') &&
            Schema::hasColumn('saving_graduates', 'regular_level4_saving') &&
            Schema::hasColumn('saving_graduates', 'regular_level5_saving') &&

            Schema::hasColumn('saving_graduates', 'extension_level1_saving') &&
            Schema::hasColumn('saving_graduates', 'extension_level2_saving') &&
            Schema::hasColumn('saving_graduates', 'extension_level3_saving') &&
            Schema::hasColumn('saving_graduates', 'extension_level4_saving') &&
            Schema::hasColumn('saving_graduates', 'extension_level5_saving')))
        {
            Schema::table('saving_graduates', function (Blueprint $table) {
                $table->double('regular_level1_saving')->after('regular_level1_female');
                $table->double('regular_level2_saving')->after('regular_level2_female');
                $table->double('regular_level3_saving')->after('regular_level3_female');
                $table->double('regular_level4_saving')->after('regular_level4_female');
                $table->double('regular_level5_saving')->after('regular_level5_female');

                $table->double('extension_level1_saving')->after('extension_level1_female');
                $table->double('extension_level2_saving')->after('extension_level2_female');
                $table->double('extension_level3_saving')->after('extension_level3_female');
                $table->double('extension_level4_saving')->after('extension_level4_female');
                $table->double('extension_level5_saving')->after('extension_level5_female');
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
        if(! (Schema::hasColumn('saving_graduates', 'birr') && Schema::hasColumn('saving_graduates', 'cent')))
        {
            Schema::table('saving_graduates', function (Blueprint $table) {
                $table->integer('birr')->after('extension_level5_female');
                $table->integer('cent')->after('birr');
            });
        }

        if((Schema::hasColumn('saving_graduates', 'regular_level1_saving') &&
            Schema::hasColumn('saving_graduates', 'regular_level2_saving') &&
            Schema::hasColumn('saving_graduates', 'regular_level3_saving') &&
            Schema::hasColumn('saving_graduates', 'regular_level4_saving') &&
            Schema::hasColumn('saving_graduates', 'regular_level5_saving') &&

            Schema::hasColumn('saving_graduates', 'extension_level1_saving') &&
            Schema::hasColumn('saving_graduates', 'extension_level2_saving') &&
            Schema::hasColumn('saving_graduates', 'extension_level3_saving') &&
            Schema::hasColumn('saving_graduates', 'extension_level4_saving') &&
            Schema::hasColumn('saving_graduates', 'extension_level5_saving')))
        {
            Schema::table('saving_graduates', function (Blueprint $table) {
                $table->dropColumn('regular_level1_saving');
                $table->dropColumn('regular_level2_saving');
                $table->dropColumn('regular_level3_saving');
                $table->dropColumn('regular_level4_saving');
                $table->dropColumn('regular_level5_saving');

                $table->dropColumn('extension_level1_saving');
                $table->dropColumn('extension_level2_saving');
                $table->dropColumn('extension_level3_saving');
                $table->dropColumn('extension_level4_saving');
                $table->dropColumn('extension_level5_saving');
            });

        }

    }
}
