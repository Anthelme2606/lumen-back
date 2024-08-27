<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchRecord extends Model
{
    use HasFactory;
    protected $table='matchs_records';
    protected $fillable=[
        'id',
        'match_id'
    ];
    public function match()
    {
        return $this->belongsTo(TeamsVersus::class, 'match_id');
    }
}
