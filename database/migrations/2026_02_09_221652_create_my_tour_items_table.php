<?php

use App\Enums\Tour\TourItemTypeEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('my_tour_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('my_tour_id')->constrained()->cascadeOnDelete();
            $table->string('type');
            $table->string('title');
            $table->text('description')->nullable();
            $table->unsignedSmallInteger('day_number')->nullable();
            $table->unsignedSmallInteger('order')->default(0);
            $table->json('meta_data')->nullable();
            $table->string('cover_image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('my_tour_items');
    }
};