<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_packages', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->double("price");
            $table->unsignedInteger("no_tickets");
            $table->unsignedInteger("validation_period");
            $table->date("available_from");
            $table->date("available_to");
            $table->tinyInteger("status")->default(2)->comment("1 for Active, 2 for Inactive");
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
        Schema::drop('ticket_packages');
    }
}
