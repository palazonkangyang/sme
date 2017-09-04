<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyerCustomPackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyer_custom_packages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("buyer_id");
            $table->double("price");
            $table->integer("no_tickets");
            $table->integer("validation_period");
            $table->text("remark");
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
        Schema::drop('buyer_custom_packages');
    }
}
