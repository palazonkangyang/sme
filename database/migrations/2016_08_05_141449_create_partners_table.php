<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->increments('id');
            $table->string("company_name");
            $table->string("contact_person");
            $table->string("email")->unique();
            $table->string("password", 60);
            $table->string("address");
            $table->string("postal_code", 15);
            $table->string("contact_no", 30);
            $table->double("spe_ticket_price")->nullable();
            $table->unsignedTinyInteger("first_login_attempt")->default(1)->comment("1 for Yes, 2 for No");
            $table->tinyInteger("status")->default(2)->comment("1 for active, 2 for inactive");
            $table->rememberToken();
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
        Schema::drop('partners');
    }
}
