<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    //add new field to table users (default laravel)
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone_number', 20)->nullable(); //tambahan
            $table->string('role', 20)->default('customer'); //tambahan
            $table->softDeletes(); //tambahan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //cara untuk menghapus kolom yang sudah ditambahkan
            $table->dropColumn(['phone_number', 'role']);
            $table->dropSoftDeletes();
        });
    }
};
