<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyShortTermTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('short_term_trainings', function (Blueprint $table) {
            $table->foreign('report_date_id')
                ->references('id')
                ->on('report_dates')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('short_term_trainings', function (Blueprint $table) {
            $table->dropForeign(['report_date_id']);
        });
    }
}
