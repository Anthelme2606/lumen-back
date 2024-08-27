<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamEvents extends Model
{
    use HasFactory;
    protected $table="team_events";
    protected $fillable=[
        'team_id',
        'match_id',
        'player_id',
        'carton_jaune',
        'carton_rouge',
        'but_marques'
    ];
   
   
}
