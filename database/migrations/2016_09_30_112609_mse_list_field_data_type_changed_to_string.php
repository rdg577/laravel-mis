<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MseListFieldDataTypeChangedToString extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cooperative_trainings', function (Blueprint $table) {
            $table->string('mse_list', 100)->change();
            $table->boolean('mse_mou')->default(false)->change();
            $table->boolean('mse_joint_plan')->default(false)->change();
            $table->boolean('mse_training')->default(false)->change();
            $table->boolean('mse_trainers')->default(false)->change();
            $table->string('ml_list', 100)->change();
            $table->boolean('ml_mou')->default(false)->change();
            $table->boolean('ml_joint_plan')->default(false)->change();
            $table->boolean('ml_training')->default(false)->change();
            $table->boolean('ml_trainers')->default(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cooperative_trainings', function (Blueprint $table) {
            $table->integer('mse_list')->change();
            $table->integer('mse_mou')->change();
            $table->integer('mse_joint_plan')->change();
            $table->integer('mse_training')->change();
            $table->integer('mse_trainers')->change();
            $table->integer('ml_list')->change();
            $table->integer('ml_mou')->change();
            $table->integer('ml_joint_plan')->change();
            $table->integer('ml_training')->change();
            $table->integer('ml_trainers')->change();
        });
    }
}
