<?php

use App\Enums\Tour\TourStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('my_tours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedSmallInteger('duration_days');
            $table->unsignedSmallInteger('duration_nights');
            $table->unsignedSmallInteger('adults_count')->default(1);
            $table->unsignedSmallInteger('children_count')->default(0);
            $table->boolean('include_flight')->default(false);
            $table->boolean('include_transfer')->default(false);
            $table->boolean('include_insurance')->default(false);
            $table->text('special_requests')->nullable();
            $table->decimal('estimated_price', 12, 2)->default(0);
            $table->decimal('final_price', 12, 2)->nullable();
            $table->string('status')->default(TourStatusEnum::Draft->value);
            $table->text('manager_notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('my_tours');
    }
};