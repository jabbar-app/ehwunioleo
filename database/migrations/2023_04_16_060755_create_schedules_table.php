<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->date('date')->default(DB::raw('NOW()'));
            $table->string('user_name');
            $table->string('user_id');
            $table->string('waste_name');
            $table->string('waste_code');
            $table->string('amount');
            $table->string('weight');
            $table->string('packaging');
            $table->string('source');
            $table->string('dispose_to')->nullable();
            $table->string('status');
            $table->text('note')->nullable();
            $table->string('v_symbol')->nullable();
            $table->string('v_packaging')->nullable();
            $table->string('v_label')->nullable();
            $table->integer('step')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
