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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->unique()->after('email');
            $table->enum('role', ['buyer', 'owner', 'admin'])->default('buyer')->after('phone');
            $table->enum('kyc_status', ['pending', 'approved', 'rejected'])->default('pending')->after('role');
            $table->decimal('reputation_score', 5, 2)->default(0.00)->after('kyc_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone', 'role', 'kyc_status', 'reputation_score']);
        });
    }
};