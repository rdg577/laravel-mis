<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);

            $table->string('user_type');
            $table->boolean('active')->default(false);
            $table->integer('institution_id')->unsigned();
            $table->integer('region_id')->unsigned();

            $table->rememberToken();
            $table->timestamps();
        });

        /*
         * inserting system admin user
         */
        $user = ['name' => 'System Administrator',
                 'email' => 'rdg577@yahoo.com',
                 'password' => Hash::make('danger'),
                 'user_type' => 'System Administrator',
                 'active' => true,
                 'institution_id' => 1,
                 'region_id' => 10
                ];
        DB::table('users')->insert($user);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
