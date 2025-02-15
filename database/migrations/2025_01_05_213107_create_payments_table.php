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
        Schema::create('payments', function (Blueprint $table)
        {
            $table->id();
            $table->foreignId('teacher_id')->constrained();
            $table->foreignId('student_id')->constrained();
            $table->unsignedBigInteger('invoice_id');
            $table->string('invoice_key');
            $table->string('payment_method')->nullable();
            $table->string('currency')->default('EGP');
            $table->decimal('commission', 15, 2)->default(0.00);
            $table->decimal('total', 15, 2);
            $table->boolean('paid')->default(false);
            $table->dateTime('paid_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
