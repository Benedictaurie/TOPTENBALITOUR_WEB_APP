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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_code', 20)->unique();
            $table->foreignId('user_id')->constrained('users');
            $table->string('booking_type', 20); // tour/activity/rental
            $table->foreignId('tour_packages_id')->nullable()->constrained('tour_packages');
            $table->foreignId('activity_packages_id')->nullable()->constrained('activity_packages');
            $table->foreignId('rental_packages_id')->nullable()->constrained('rental_packages');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->integer('num_persons')->default(1);
            $table->string('status', 30)->default('pending'); // confirmed, completed, cancelled
            $table->decimal('total_price', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
