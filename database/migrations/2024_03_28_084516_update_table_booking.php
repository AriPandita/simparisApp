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
            $table->string('payment_status')->after('status');
            $table->dropForeign('booking_id_customer_foreign');
            $table->renameColumn('status', 'booking_status');
            $table->foreign('id_customer')->references('id')->on('customer')->change();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('booking', function(Blueprint $table) {
            $table->renameColumn('booking_status', 'status');
            $table->dropColumn('payment_status');
        });
    }
};
