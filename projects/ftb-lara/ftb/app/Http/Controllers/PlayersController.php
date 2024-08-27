<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PlayerService;
class PlayersController extends Controller
{
    protected $player_s;
    public function __construct(PlayerService $pls){
    $this->player_s=$pls;
    }
    public function trophies(){
        return view('players.trophies');
    }
    public function store(Request $request)
    {
        $request->validate([
          'team' => 'string|required',
          'logo' => 'file|required',
          'nom' =>'string|required',
          'dorsa' =>'string | required',
        
        ]);
        
        return $this->player_s->createPlayer($request->all());

    }
}
