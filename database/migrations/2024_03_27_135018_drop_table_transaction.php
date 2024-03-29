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
        Schema::drop('transaction');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->string('img_receipt', 10);
            $table->enum('status', ['unvalidate', 'validate', 'denied']);
            $table->timestamps();
        });
    }
};
