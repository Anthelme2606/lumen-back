<?php
namespace App\Repositories\TeamsRepositories;
use Illuminate\Support\Collection;
use App\Models\Team;
use App\Models\Player;
use App\Models\Poule;
use App\Models\PouleTeam;
use App\Models\TeamsVersus;
use App\Models\TeamEvents;
use App\Models\Representant;
use App\Models\MatchRecord;

class TeamRepository
{
    protected $model;
    
    protected $player;
    protected $p_team;
    protected $rep;
    protected $poule;

    public function __construct(Team $team,
    Poule $poule,
    PouleTeam $p_team,
    Player $player,Representant $rep)
    {
        $this->model = $team;
        $this->player = $player;
        $this->rep=$rep;
        $this->$p_team=$p_team;
        $this->poule=$poule;
    }
    public function createRecord(array $data){
        return MatchRecord::create($data);
    }
    public function records(){
        return MatchRecord::all();
    }
    public function createEvent(array $data){
        return TeamEvents::create($data);
    }
    public function matchProche(){
        return TeamsVersus::whereNotNull('date_match')->orderBy('date_match', 'asc')->first();
    }
    public function matchOrga(){
        return TeamsVersus::whereNotNull('date_match')->orderBy('date_match', 'asc')->get();
    }
    public function matches(){
        return TeamsVersus::all();
    }
    public function match_event_eachplayer($match_id,$team_id,$player_id){
        $event= TeamEvents::where('match_id',$match_id)
                           ->where('team_id',$team_id)
                           ->where('player_id',$player_id)
                           ->first();
        
        return $event;
    }
    public function findEvent($id){
        return TeamEvents::find($id);
    }
    public function updateEvent($match_id, $team_id, $player_id, TeamEvents $event_e)
{
    // Récupérer l'événement pour ce joueur, match et équipe spécifiques
    $event = $this->match_event_eachplayer($match_id, $team_id, $player_id);

    // Mettre à jour l'événement avec les nouvelles valeurs
    return $event->update($event_e->toArray());
}
public function updatePlayer($id, Player $player_e){
    $player=Player::find($id);
    return $player->update($player_e->toArray());
}
public function updateTeam($id, Team $team_e){
    $team=Team::find($id);
    return $team->update($team_e->toArray());
}
public function getPlayer($id){
    $player=Player::find($id);
   return $player;
}
public  function goals($match_id, $team_id)
{
    return TeamEvents::where('match_id', $match_id)
                ->where('team_id', $team_id)
                ->sum('but_marques');
}
public  function team_event($match_id, $team_id)
{
    return TeamEvents::where('match_id', $match_id)
                ->where('team_id', $team_id)
                ->first();
}
public function countVictories($teamId)
{
    
    return TeamEvents::where('team_id', $teamId)
                     ->where('victoire', 1)
                     ->count();
}
public function playes($teamId)
{
    $victories = TeamEvents::where('team_id', $teamId)
                            ->where('victoire', 1)
                            ->count();

    $draws = TeamEvents::where('team_id', $teamId)
                        ->where('nul', 1)
                        ->count();

    $defeats = TeamEvents::where('team_id', $teamId)
                          ->where('defaite', 1)
                          ->count();

   return $victories+$draws +$defeats;
}

public function countDefaites($teamId)
{
    
    return TeamEvents::where('team_id', $teamId)
                     ->where('defaite', 1)
                     ->count();
}
public function countNuls($teamId)
{
    
    return TeamEvents::where('team_id', $teamId)
                     ->where('nul', 1)
                     ->count();
}

public function updateMatchResults( $team1_event, $team2_event, $goals1, $goals2)
{
   
    if ($goals1 > $goals2) {
        // Team 1 wins
        $team1_event->victoire = 1;
        $team1_event->defaite=0;
        $team2_event->victoire= 0;
        $team2_event->defaite= 1;
        $team1_event->nul = 0;
        $team2_event->nul = 0;
    } elseif ($goals1 < $goals2) {
        $team2_event->victoire = 1;
        $team2_event->defaite=0;
        $team1_event->victoire= 0;
        $team1_event->defaite= 1;
        $team1_event->nul = 0;
        $team2_event->nul = 0;
       
    }elseif($goals1===$goals2){
        $team1_event->nul = 1;
        $team2_event->nul = 1;
        $team1_event->victoire = 0;
        $team1_event->defaite = 0;
        $team2_event->victoire = 0;
        $team2_event->defaite = 0;
      
    }

    $team1_event->save();
    $team2_event->save();
}

   

    public function getAll()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }
    public function create_match(array $data)
    {
        return TeamsVersus::create($data);
    }
    public function versusByDate($date)
    {
        return TeamsVersus::where('date_match',$date)->first();
    }
    public function versusById($id)
    {
        return TeamsVersus::find($id);
    }
    public function pouleExist($name){
        $name = trim($name);
        $name = str_replace(' ', '', $name);
        $poule=Poule::where('name',$name)->first();
        if($poule && $poule!==null){
            return true;
        }
        return false;
    }
    public function createTeamPoule( array $data){
        return $this->p_team->create($data);
    }
    public function getPTeams(){
        return PouleTeam::all();
    }
    public function getPoules(){
        return Poule::all();
    }
    public function getPoule($id){
        return Poule::find($id);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }
    public function find_p($id)
    {
        return $this->player->find($id);
    }
    public function find_r($id)
    {
        return $this->rep->find($id);
    }

    public function update($id, array $data)
    {
        $team = $this->model->find($id);
       return $team->update($data);
    }
    public function update_r($id, array $data)
    {
        $rep = $this->rep->find($id);
       return $rep->update($data);
    }
    public function but_carton($id, array $data)
    {
     
        $player = $this->player->find($id);
    
        if ($player) {
          
            $player->update($data);
    
            return true;
        }
    
        return false;
    }
    public function createPoule( array $data){
        return $this->poule->create($data);
    }
    
    public function update_p($id, array $data)
    {
        $play = $this->player->find($id);

      return $play->update($data);
    }
    public function getD($dorsa, $team_p)
    {
         $play = $this->player->where('dorsa', $dorsa)->first();
    
        if ($play) {
           
            foreach ($team_p as $p) {
              
                if ($p['dorsa'] === $play->dorsa) {
                    return $play; 
                }
            }
        }
    
       
        return null;
    }
    public function getP($dorsa, $team_p)
    {
         $play = $this->player->where('dorsa', $dorsa)->first();
    
        if ($play) {
           
            foreach ($team_p as $p) {
              
                if ($p['id'] === $play->id) {
                    return $play; 
                }
            }
        }
    
       
        return null;
    }
    
    public function getByName($name)
{
  
    return Team::where('nom', $name)->first();
}
public function getByName2($name)
{
  
    return Player::where('nom', $name)->first();
}
public function getByName3($name)
{
  
    return Representant::where('nom', $name)->first();
}

    public function delete($id)
    {
        $team = $this->model->find($id);
        if ($team) {
            $team->delete();
            return true;
        }
        return false;
    }
}
