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
        Schema::table('package', function(Blueprint $table) {
            $table->integer('price')->after('id');
            $table->tinyInteger('package_duration')->after('id');
            $table->string('package_name')->after('id');
        });
        Schema::table('services', function(Blueprint $table){
            $table->tinyInteger('service_duration')->after('service_name');
        });
        Schema::create('package_image', function(Blueprint $table) {
            $table->id();
            $table->string('imgdir');
            $table->unsignedBigInteger('id_package');
            $table->foreign('id_package')->references('id')->on('package');
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('package', function(Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('package_duration');
            $table->dropColumn('package_name');
        });
        Schema::table('services', function(Blueprint $table){
            $table->dropColumn('service_duration');
        });
        Schema::dropIfExists('package_image');
    }
};
