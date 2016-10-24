<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IncreaseCharsPetsaInReportDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('report_dates', function (Blueprint $table) {
            $table->string('petsa', 50)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('report_dates', function (Blueprint $table) {
            $table->string('petsa', 10)->change();
        });
    }
}
