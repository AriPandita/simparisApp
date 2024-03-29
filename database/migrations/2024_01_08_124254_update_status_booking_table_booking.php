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
        Schema::table('booking', function (Blueprint $table) {
            $table->enum('status_booking', ['inprogress', 'accepted', 'reschedule', 'cancelled', 'complete'])->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('booking', function (Blueprint $table) {
            $table->enum('status_booking', ['inprogress', 'accepted', 'reschedule', 'cancelled'])->change();
        });
    }
};
