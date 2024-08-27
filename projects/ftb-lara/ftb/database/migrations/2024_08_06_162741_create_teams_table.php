<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('pseudo');
            $table->unsignedBigInteger('representant_id');
            $table->integer('match_joues')->default(0);
            $table->integer('nul')->default(0);
            $table->integer('defaites')->default(0);
            $table->integer('buts_marques')->default(0);
            $table->integer('buts_encaissees')->default(0);
            $table->integer('victoires')->default(0);
            $table->integer('differences_buts')->default(0);
            $table->timestamps();

            $table->foreign('representant_id')->references('id')->on('representants')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
