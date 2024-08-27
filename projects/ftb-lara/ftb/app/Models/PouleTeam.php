<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PouleTeam extends Model
{
    use HasFactory;
    protected $table = 'poule_team';
    protected $fillable = ['poule_id','team_id'];

}
