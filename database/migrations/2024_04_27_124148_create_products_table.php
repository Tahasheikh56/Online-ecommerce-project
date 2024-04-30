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
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->unsignedInteger('price');
            $table->unsignedInteger('quantity');
            $table->string('image');
            $table->json('other_media')->nullable();
            $table->enum('status',['Active','InActive'])->default('Active');
            $table->unsignedbigInteger('category_id');
            $table->unsignedbigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('myuser')->onDelete('cascade');
            $table->timestamps();
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
