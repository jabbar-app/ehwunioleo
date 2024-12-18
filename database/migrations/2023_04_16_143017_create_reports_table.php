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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->date('date_in');
            $table->date('date');
            $table->string('user_name');
            $table->string('user_id');
            $table->string('waste_name');
            $table->string('waste_code');
            $table->string('source');
            $table->string('amount');
            $table->string('weight');
            $table->string('packaging');
            $table->string('dispose_to');
            $table->string('note');
            $table->string('cost')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
