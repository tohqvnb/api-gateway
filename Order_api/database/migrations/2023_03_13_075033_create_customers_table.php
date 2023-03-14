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
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->date('date_of_birth');
            $table->string('phone_number');
            $table->string('job_title');
            $table->string('home_phone')->nullable();
            $table->string('company_name');
            $table->string('fax');
            $table->boolean('status', '0');
            $table->enum('gender', ['male', 'female']);
            $table->datetime('registered_at');
            $table->datetime('last_login');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
