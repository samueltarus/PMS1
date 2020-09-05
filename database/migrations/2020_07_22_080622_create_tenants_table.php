<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {


            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username');
            $table->string('passport');
            $table->string('email');
            $table->string('occupation');
            $table->date('date_of_birth');
            $table->string('address');
            $table->string('county');
            $table->string('constituency');
            $table->string('town');
            $table->integer('phone_number');
            $table->string('avatar');
            $table->integer('status');
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
        Schema::dropIfExists('tenants');
    }
}
