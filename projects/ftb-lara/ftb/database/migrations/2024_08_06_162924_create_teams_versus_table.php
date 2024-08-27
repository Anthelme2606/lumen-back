<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsVersusTable extends Migration
{
    public function up()
    {
        Schema::create('teams_versus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team1_id');
            $table->unsignedBigInteger('team2_id');
            $table->date('date_match');
            $table->integer('premier_mi_temps')->default(45);
            $table->integer('deuxieme_mi_temps')->default(45);
            $table->timestamps();

            $table->foreign('team1_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('team2_id')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('teams_versus');
    }
}
