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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->enum('status', ['pending_payment', 'pending_moderation', 'available', 'sold', 'rejected', 'expired'])->default('pending_payment');
            $table->bigInteger('price');
            $table->enum('certificate_type', ['SHM', 'HGB', 'Girik', 'Lainnya'])->default('SHM');
            $table->string('main_image_url')->nullable();
            $table->json('location_data'); //
            $table->json('features_data'); //
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};