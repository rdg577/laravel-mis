<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        $regions = [
            ['name' => 'Afar'],
            ['name' => 'Amhara'],
            ['name' => 'Tigray'],
            ['name' => 'Benishangul-Gumuz'],
            ['name' => 'Oromia'],
            ['name' => 'SNNPR'],
            ['name' => 'Somali'],
            ['name' => 'Addis Ababa'],
            ['name' => 'Dire Dawa']
        ];

        for($i = 0; $i < count($regions); $i++)
            DB::table('regions')->insert($regions[$i]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('regions');
    }
}
