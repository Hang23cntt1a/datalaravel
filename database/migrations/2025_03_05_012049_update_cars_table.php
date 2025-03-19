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
        Schema::table('cars', function (Blueprint $table) {
            $table->renameColumn('make', 'description');
          $table->string('image')->nullable()->after('mf_id');
        });
    }
    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->renameColumn('description', 'make');
        });
    Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
    
};
