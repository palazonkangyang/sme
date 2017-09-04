<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("booking_id");
            $table->string("trans_id");
            $table->double("amount");
            $table->unsignedTinyInteger("type")->comment("1 for ticket, 2 for package");
            $table->unsignedTinyInteger("status")->default(1)->comment("1 for paid, 2 for pending");
            $table->text("remark")->nullable();
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
        Schema::drop('payment_transactions');
    }
}
