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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->string('name', 100);
            $table->string('phone_number', 20)->nullable();
            $table->string('vehicle_type', 50)->nullable(); // motor/mobil
            $table->string('license_plate', 50)->nullable();
            $table->string('status', 20)->default('inactive'); // active, inactive, on-duty
            $table->dateTime('last_active')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
