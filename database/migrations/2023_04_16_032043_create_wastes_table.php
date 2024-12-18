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
        Schema::create('wastes', function (Blueprint $table) {
            $table->id();
            $table->string('waste_name')->unique();
            $table->string('waste_code');
            $table->string('packaging');
            $table->integer('capacity')->nullable();
            $table->integer('used')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wastes');
    }
};
