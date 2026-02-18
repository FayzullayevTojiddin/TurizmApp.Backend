<?php

use App\Enums\Tour\TourPackageStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tour_packages', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->string('slug')->unique();
            $table->json('description')->nullable();
            $table->unsignedSmallInteger('duration_days');
            $table->unsignedSmallInteger('duration_nights');
            $table->decimal('base_price', 12, 2);
            $table->unsignedTinyInteger('discount_percent')->default(0);
            $table->unsignedSmallInteger('max_people');
            $table->unsignedSmallInteger('min_people')->default(1);
            $table->json('included_services')->nullable();
            $table->json('excluded_services')->nullable();
            $table->string('meal_plan')->nullable();
            $table->string('status')->default(TourPackageStatusEnum::Active->value);
            $table->boolean('featured')->default(false);
            $table->string('cover_image')->nullable();
            $table->json('gallery')->nullable();
            $table->json('videos')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tour_packages');
    }
};