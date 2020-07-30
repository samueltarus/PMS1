<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('landlord_id');
            $table->foreign('landlord_id')->references('id')->on('landlords')->onDelete('cascade')->onUpdate('cascade');
            $table->string('property_name');
            $table->string('property_type');
            $table->string('property_description');
            $table->integer('number_of_units');
            $table->integer('projected_monthly_rev');
            $table->integer('projected_annulized_rev');

            $table->integer('management_fee');
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
        Schema::dropIfExists('properties');
    }
}
