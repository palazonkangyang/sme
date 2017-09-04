<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAmountColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("agbuyer_packages", function (Blueprint $table) {
            $table->double("amount");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("buyer_packages", function (Blueprint $table) {
            $table->dropColumn("buyer_packages");
        });
    }
}
