<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tour_package_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_package_id')->constrained()->cascadeOnDelete();
            $table->string('type');
            $table->json('title');
            $table->json('description')->nullable();
            $table->unsignedSmallInteger('day_number')->nullable();
            $table->unsignedSmallInteger('order')->default(0);
            $table->json('meta_data')->nullable();
            $table->string('cover_image')->nullable();
            $table->json('gallery')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tour_package_items');
    }
};