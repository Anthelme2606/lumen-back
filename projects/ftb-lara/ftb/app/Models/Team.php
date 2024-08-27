<?php
// app/Models/Team.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nom', 
        'pseudo', 
    'image',
    'representant_id', 'match_joues', 'nul',
     'defaites', 'buts_marques', 'buts_encaissees',
      'victoires', 'differences_buts'];

    public function representant()
    {
        return $this->belongsTo(Representant::class);
    }

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function team1Versus()
    {
        return $this->hasMany(TeamsVersus::class, 'team1_id');
    }
    public function team_event(){
        return $this->belongsTo(TeamEvents::class, 'team_id');  
    }

    public function team2Versus()
    {
        return $this->hasMany(TeamsVersus::class, 'team2_id');
    }
    public function poules()
    {
        return $this->belongsToMany(Poule::class, 'poule_team');
    }
    public function matchesAsTeam1()
    {
        return $this->hasMany(TeamsVersus::class, 'team1_id');
    }

    // Relation pour les matchs où l'équipe est team2
    public function matchesAsTeam2()
    {
        return $this->hasMany(TeamsVersus::class, 'team2_id');
    }
   

    public function oun_versus()
    {
       
        $matchesAsTeam1 = $this->matchesAsTeam1();

        $matchesAsTeam2 = $this->matchesAsTeam2();
        if(isset($matchesAsTeam1) && !empty($matchesAsTeam1))
        {
            return $matchesAsTeam1;
        }else{
            return $matchesAsTeam2;
        }

    }
    
  
}

