<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnersProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("partner_id");
            $table->unsignedInteger("product_id");
            $table->softDeletes();
            $table->timestamps();

            $table->foreign("partner_id")
                ->references("id")
                ->on("partners")
                ->onDelete("cascade");

            $table->foreign("product_id")
                ->references("id")
                ->on("products")
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
        Schema::drop('partner_products');
    }
}
