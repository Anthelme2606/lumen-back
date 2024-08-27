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
        Schema::table('teams', function (Blueprint $table) {
            //
            $table->string('image')->nullable()->after('pseudo'); // Ajoute la colonne image après la colonne pseudo
  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teams', function (Blueprint $table) {
            //
            $table->dropColumn('image'); // Supprime la colonne image si la migration est annulée
  
        });
    }
};
