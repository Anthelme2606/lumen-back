<?php

// app/Models/Player.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'dorsa',
     'logo', 
    'team_id', 'buts_marques', 'match_joues', 'cartons_rouges', 'cartons_jaunes'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}

