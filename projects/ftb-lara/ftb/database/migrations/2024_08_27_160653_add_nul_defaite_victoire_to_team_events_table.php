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
        Schema::table('team_events', function (Blueprint $table) {
            //
            $table->integer('nul')->default(0);
            $table->integer('defaite')->default(0);
            $table->integer('victoire')->default(0);
        });
    }

    
    public function down()
    {
        Schema::table('team_events', function (Blueprint $table) {
            $table->dropColumn(['nul', 'defaite', 'victoire']);
        });
    }
};
