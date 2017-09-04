<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBuyerInformationTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("ticket_bookings", function (Blueprint $table) {
            $table->unsignedInteger("buyer_id")->nullable();
            $table->unsignedTinyInteger("payment_method")->default(1)->comment("1 for PayPal, 2 for credit");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("ticket_bookings", function (Blueprint $table) {
            $table->dropColumn([
                "buyer_id",
                "payment_method"
            ]);
        });
    }
}
