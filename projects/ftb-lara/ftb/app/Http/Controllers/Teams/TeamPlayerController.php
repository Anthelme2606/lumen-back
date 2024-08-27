<?php

namespace App\Http\Controllers\Teams;

use Illuminate\Http\Request;
 use App\Services\PlayerService;
 use App\Services\TeamServices\TeamService;
class TeamPlayerController 
{
    //
    protected $team_s;
    protected $player_s;
    public function __construct(TeamService $t_s, PlayerService $p_s){
        $this->team_s=$t_s;
        $this->player_s=$p_s;
    }
    public function t_update(Request $request){
       
  $request->validate([
  'team'=> 'string|required',
  'team-name'=> 'string|required',
  'team-pseudo' => 'string|required',
  'team-representant'=>'string|required'
  ]);
  return $this->team_s->t_update($request->all());
 
    }
    public function p_update(Request $request){
        //dd($request);
        $request->validate([
            'team'=> 'string|required',
            'player'=> 'string|required',
            'nom' => 'string|required',
            'dorsa'=>'string|required'
            ]);
            return $this->team_s->p_update($request->all());
    }
    public function but_carton(Request $request){

        //
        $request->validate([
            'team'=> 'string|required',
            'player'=> 'string|required',
            'goals' => 'string|nullable',
            'yellow_card'=>'string|nullable',
            'red_card'=>'string|nullable',
            'matches_played'=>'string|nullable'
            ]);
           // dd($request);
            return $this->team_s->but_carton($request->all());
    }
    public function m_creation(Request $request){

         // dd($request);
        $request->validate([
            'team1_id'=> 'string|required',
            'team2_id'=> 'string|required',
            'date' => 'string|nullable',
            'timer'=>'string|nullable',
          
            ]);
           // dd($request);
            return $this->team_s->match_creation($request->all());
    }
   public function f_match(Request $request)
    {
        //dd($request);
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'team' => 'required|exists:teams,id',
            'players' => 'required|array',
            // 'players.*.player_id' => 'required|exists:players,id',
            // 'players.*.match_id' => 'required',
            // 'players.*.play' => 'sometimes|integer',
            // 'players.*.carton' => 'sometimes|in:J,R',
            // 'players.*.goal' => 'sometimes|integer|min:0',
        ]);
    
        // Passer les données validées au service
      return  $this->team_s->f_creation($validatedData);
    
       // return redirect()->route('your.route.name')->with('success', 'Fiche créée avec succès!');
    }
    
   public function record(Request $request){

        
    $request->validate([
        'match_id'=> 'string|required',
      
        ]);
     
        return $this->team_s->record($request->all());
}
    public function c_poule(Request $request){

        
        $request->validate([
            'name'=> 'string|required',
          
            ]);
         
            return $this->team_s->c_poule($request->all());
    }
    public function creation(){
        $teams=$this->team_s->getAllTeams();
        $poules=$this->team_s->getPoules();
        $team_service=$this->team_s;
        $records=$this->team_s->matchs();
     // dd($this->team_s->opponents($teams,$this->team_s->teamById(11)));
        return view('players-teams.creation', compact('teams','poules','team_service','records'));
    }
    public function add_t_p(Request $request){
        $request->validate([
            'poule'=>'string|required'
        ]);
        return $this->team_s->add_t_p($request->all());
    }
}
