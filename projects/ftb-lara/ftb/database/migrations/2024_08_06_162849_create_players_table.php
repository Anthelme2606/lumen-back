<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('dorsa');
            $table->string('logo')->nullable();
            $table->unsignedBigInteger('team_id');
            $table->integer('buts_marques')->default(0);
            $table->integer('match_joues')->default(0);
            $table->integer('cartons_rouges')->default(0);
            $table->integer('cartons_jaunes')->default(0);
            $table->timestamps();

            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('players');
    }
}
