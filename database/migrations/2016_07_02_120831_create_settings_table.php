<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->double("ticket_price");
            $table->text("ticket_unavailable")->nullable();
            $table->string("enquiry_email", 150);
            $table->string("smtp_host");
            $table->string("smtp_user", 150);
            $table->string("smtp_port", 30);
            $table->string("encryption", 3);
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
        Schema::drop('settings');
    }
}
