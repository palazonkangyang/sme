<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_codes', function (Blueprint $table) {

            $table->increments('id');
            $table->string("promo_code")->unique();
            $table->double("discount");
            $table->date("valid_from");
            $table->date("valid_to");
            $table->integer("volume")->unsigned();
            $table->integer("admin_id")->unsigned();
            $table->unsignedTinyInteger("status")->default(2)->comment("1 for active, 2 for inactive");
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
        Schema::drop('promo_codes');
    }
}
