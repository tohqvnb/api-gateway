<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('city');
            $table->string('building');
            $table->integer('apartment_number');
            $table->string('street_name');
            $table->string('street_number');
            $table->string('state');
            $table->string('country');
            $table->string('post_code');
            $table->unsignedInteger('customer_id');
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
