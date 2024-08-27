<?php

// app/Models/TeamsVersus.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamsVersus extends Model
{
    use HasFactory;
     protected $table="teams_versus";
    protected $fillable = ['team1_id', 
    'team2_id', 
    'heure_match',
    'date_match',
     'premier_mi_temps', 
     'deuxieme_mi_temps'];

    public function team1()
    {
        return $this->belongsTo(Team::class, 'team1_id');
    }

    public function team2()
    {
        return $this->belongsTo(Team::class, 'team2_id');
    }
    public function Record()
    {
        return $this->belongsTo(MatchRecord::class, 'id','match_id');
    }
}

