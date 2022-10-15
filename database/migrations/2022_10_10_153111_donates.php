<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donates', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 200);
            $table->string('last_name', 200);
            $table->string('company', 200);
            $table->smallInteger('gender');
            $table->string('email', 100);
            $table->string('phonenumber', 20);
            $table->smallInteger('credit_method');
            $table->string('card_number', 30);
            $table->string('expiration_date', 2);
            $table->string('expiration_year', 4);
            $table->string('amount', 100);
            $table->timestamp('created_at')->nullable();
            $table->bigInteger('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
