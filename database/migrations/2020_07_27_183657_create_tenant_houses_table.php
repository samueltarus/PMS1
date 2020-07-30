<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenant_houses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('house_id');
            $table->foreign('house_id')->references('id')->on('houses')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('passport');
            $table->string('username');
            $table->string('property_name');
            $table->string('unit_name');

            $table->integer('monthly_rent');
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
        Schema::dropIfExists('tenant_houses');
    }
}
