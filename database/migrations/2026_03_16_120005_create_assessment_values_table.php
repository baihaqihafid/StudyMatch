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
    Schema::create('assessment_values', function (Blueprint $table) {
        $table->id();
        $table->foreignId('assessment_id')->constrained()->onDelete('cascade');
        $table->foreignId('criteria_id')->constrained()->onDelete('cascade');
        $table->decimal('value', 8, 2);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessment_values');
    }
};
