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
        Schema::create('section_details', function (Blueprint $table) {
            $table->id();
            $table->string('section_title');
            $table->string('details');
            $table->string('url');
            $table->foreignId('section_id')->constrained('sections');
            $table->enum('type',['pdf','video','test']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_details');
    }
};
