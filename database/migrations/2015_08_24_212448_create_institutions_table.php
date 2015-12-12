<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('year_establish')->nullable;
            $table->string('ownership');
            $table->string('dean_name')->nullable;
            $table->string('dean_phone')->nullable;
            $table->string('dean_email')->nullable;
            $table->string('po_box')->nullable;
            $table->string('office_telno')->nullable;
            $table->string('fax')->nullable;
            $table->string('office_email')->nullable;
            $table->string('city');
            $table->string('sub_city')->nullable;
            $table->string('woreda_zone');
            $table->string('urban_rural');
            $table->string('website_url')->nullable;
            $table->string('status');
            $table->integer('region_id')->unsigned();
            $table->integer('cluster_leader')->default(0);
            $table->timestamps();
        });

        $institute = [
            'name'                  => 'None',
            'year_establish'        => '1900-01-01',
            'ownership'             => 'Public',
            'dean_name'             => '',
            'dean_phone'            => '',
            'dean_email'            => '',
            'po_box'                => '',
            'office_telno'          => '',
            'fax'                   => '',
            'office_email'          => '',
            'city'                  => 'None',
            'sub_city'              => '',
            'woreda_zone'           => '',
            'urban_rural'           => 'Urban',
            'website_url'           => '',
            'status'                => 'Polytechnic',
            'region_id'             => 577,
            'cluster_leader'        => 0
        ];

        DB::table('institutions')->insert($institute);

        $institute = [
            'name'                  => 'Addis Ababa Polytechnic College',
            'year_establish'        => '1990-01-01',
            'ownership'             => 'Public',
            'dean_name'             => '',
            'dean_phone'            => '',
            'dean_email'            => '',
            'po_box'                => '',
            'office_telno'          => '',
            'fax'                   => '',
            'office_email'          => '',
            'city'                  => 'Addis Ababa',
            'sub_city'              => '',
            'woreda_zone'           => '',
            'urban_rural'           => 'Urban',
            'website_url'           => '',
            'status'                => 'Polytechnic',
            'region_id'             => 8,
            'cluster_leader'        => 0
        ];

        DB::table('institutions')->insert($institute);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('institutions');
    }
}
