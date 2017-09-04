<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketUsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_uses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("booking_id");
            $table->unsignedInteger("used_by")->comment("admin user id");
            $table->dateTime("used_at");
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ticket_uses');
    }
}
