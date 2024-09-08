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
        Schema::create('ecomm_additems', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->string('item_type');
            $table->decimal('price', 10, 2); // Changed to decimal for better precision
            $table->string('category');
            $table->integer('discount')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('main_img')->nullable();
            $table->string('first_img')->nullable();
            $table->string('second_img')->nullable();
            $table->string('third_img')->nullable();
            $table->string('description')->nullable(); // Changed to text for longer descriptions
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecomm_additems');
    }
};
