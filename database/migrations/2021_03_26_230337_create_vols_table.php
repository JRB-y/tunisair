<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vols', function (Blueprint $table) {
            $table->id();
            $table->string('num_vol')->required();
            $table->string('escale_depart')->required();
            $table->string('escale_arrive')->required();
            $table->string('etat_vol')->required();
            $table->string('dep_program', 5)->required();
            $table->string('arr_program', 5)->required();
            $table->string('dep_estime', 5)->required();
            $table->string('arr_estime', 5)->required();
            $table->date('date_vol')->required();
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
        Schema::dropIfExists('flights');
    }
}
