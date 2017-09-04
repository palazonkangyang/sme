<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnersLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("partner_id");
            $table->unsignedInteger("location_id");
            $table->softDeletes();
            $table->timestamps();

            $table->foreign("location_id")
                ->references("id")
                ->on("product_collection_locations")
                ->onDelete("cascade");

            $table->foreign("partner_id")
                ->references("id")
                ->on("partners")
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('partner_locations');
    }
}
