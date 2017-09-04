<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodLocation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("food_id");
            $table->unsignedInteger("location_id");
            $table->unsignedInteger("status")->default(2)->comment("1 for active, 2 for inactive");
            $table->softDeletes();
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
        Schema::drop('food_locations');
    }
}
