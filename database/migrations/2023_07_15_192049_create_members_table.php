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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->integer('booth_id');
            $table->string('name')->nullable();
            $table->string('img')->nullable();
            $table->string('phone')->nullable();
            $table->string('village')->nullable();
            $table->string('booth_name')->nullable();
            $table->string('booth_center')->nullable();
            $table->string('booth_district')->nullable();
            $table->string('booth_assembly')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
