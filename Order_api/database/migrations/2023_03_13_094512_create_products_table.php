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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->string('product_code');
            $table->tinyInteger('status');
            $table->float('discount');
            $table->string('slug');
            $table->integer('featured');
            $table->smallInteger('available');
            $table->string('product_image')->nullable();
            $table->boolean('is_physical');
            $table->integer('size')->nullable();
            $table->string('color')->nullable();
            $table->unsignedInteger('brand_id')->nullable();
            $table->unsignedInteger('supplier_id')->nullable();
            $table->datetime('starts_at');
            $table->datetime('ends_at');
            $table->timestamps();

            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
