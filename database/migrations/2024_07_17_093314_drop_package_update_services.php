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
        Schema::table('services', function (Blueprint $table) {
            $table->string('type', 20)->default('TREATMENT')->after('service_name');
        });

        Schema::dropIfExists('order_package');
        Schema::dropIfExists('package_image');
        Schema::dropIfExists('package_service');
        Schema::dropIfExists('package');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
};
