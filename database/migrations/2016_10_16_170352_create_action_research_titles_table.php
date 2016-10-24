<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionResearchTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_research_titles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('action_research_id')->unsigned();
            $table->string('title', 255);
            $table->string('type', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('action_research_titles');
    }
}
