<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassengerTicketBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->string("ticket_no", 20)->unique();
            $table->date("date");
            $table->unsignedInteger("ticket_qty")->default(1);
            $table->string("promo_code");
            $table->unsignedInteger("product");
            $table->unsignedInteger("product_qty");
            $table->string("first_name");
            $table->string("last_name");
            $table->tinyInteger("gender");
            $table->string("email");
            $table->string("contact_no");
            $table->string("address", 1000);
            $table->unsignedInteger("country");
            $table->json("how_reach_us");
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
        Schema::drop('ticket_bookings');
    }
}
