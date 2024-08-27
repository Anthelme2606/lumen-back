<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poule extends Model
{
    use HasFactory;

    /**
     * Les attributs qui sont assignables en masse.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Relation plusieurs-à-plusieurs avec le modèle Team.
     */
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'poule_team');
    }
}
