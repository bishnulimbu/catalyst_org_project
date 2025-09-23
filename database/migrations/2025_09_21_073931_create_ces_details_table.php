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
        Schema::create('ces_details', function (Blueprint $table) {
        $table->id();
        $table->string('dao_registration_number')->nullable();
        $table->string('established_date')->nullable();
        $table->string('swc_affiliation_number')->nullable();
        $table->string('pan_number')->nullable();
        $table->integer('founding_members')->nullable();
        $table->integer('total_members')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ces_details');
    }
};
