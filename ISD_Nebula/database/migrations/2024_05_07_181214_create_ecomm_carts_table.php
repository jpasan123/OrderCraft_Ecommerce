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
        Schema::create('ecomm_carts', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->decimal('price',10,2); // Added role column with default value 'admin'
            $table->decimal('discount',10,2);
            $table->string('quantity');
            $table->string('main_img');
            $table->string('description');
            $table->string('phone_number');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')->references('id')->on('ecomm_additems');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecomm_carts');
    }
};
