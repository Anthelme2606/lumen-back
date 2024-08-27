<?php
namespace App\Services\TeamServices;
use Illuminate\Support\Collection;
use App\Repositories\TeamsRepositories\TeamRepository;
use App\Repositories\Representants\RepresentantRepository;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
class TeamService
{
    protected $teamRepository;
    protected $repRepository;
    protected $request;

    public function __construct(TeamRepository $teamRepository,
    RepresentantRepository $rep,
    Request $request
    
    )
    {
        $this->teamRepository = $teamRepository;
        $this->repRepository = $rep;
        $this->request = $request;
    }
    public function getPoules(){
        return $this->teamRepository->getPoules();
    }
    public function add_t_p(array $data)
    {
        $filteredTeams = array_filter($data, function($key) {
            return strpos($key, '-team') !== false;
        }, ARRAY_FILTER_USE_KEY);
    
        $teamIds = array_map(function($key) {
            return explode('-team', $key)[0];
        }, array_keys($filteredTeams));
       
        $poule = $this->teamRepository->getPoule($data['poule']);
        // dd($poule);
        if ($poule) {
           
           
            $poule->teams()->attach($teamIds);
            return redirect()->back()->with('success','Teams attachés avec success');
        } else {
            return redirect()->back()->with('error','Poule non existant');
        }
    }
    public function matches(){
    return $this->teamRepository->matches();}
    public function matchProche(){
        return $this->teamRepository->matchProche();}
        public function matchOrga(){
            return $this->teamRepository->matchOrga();}
    function minMatch($matches) {
        $minTime = '24:00'; 
        $minMatch = false;
    
        foreach ($matches as $match) {
            // Assurez-vous que l'heure du match n'est pas nulle
            if (!empty($match['heure_match'])) {
                $currentTime = $match['heure_match'];
                
                // Comparer les heures
                if ($currentTime < $minTime) {
                    $minTime = $currentTime;
                    $minMatch = $match;
                }
            }
        }
    
        return $minMatch;
    }
    function convertToDateTime($timeStr) {
        
        $timeStr = preg_replace('/[^0-9:]/', '', $timeStr);
    
      
        if (preg_match('/^([01]\d|2[0-3]):([0-5]\d)$/', $timeStr, $matches)) {
         
            $dateTime = \DateTime::createFromFormat('H:i', $timeStr);
            
           
            if ($dateTime) {
               
                return $dateTime->format('H:i');
            }
        }
    
       
        return '00:00';
    }
    public function match_creation(array $data){
        if($data){
            $data['premier_mi_temps']=$data['timer'];
            $data['heure_match']==$this->convertToDateTime($data['heure_match']);
            if(!$this->isDateValid($data['date'])){
                return redirect()->back()->with('error','La date du match doit etre superieur ou égale a la date actuelle');
            }
            $versus=$this->teamRepository->versusByDate($data['date']);
              if($versus ){
                if($versus->team1_id==$data['team1_id']|| $versus->team2_id==$data['team1_id'] ||$versus->team1_id==$data['team2_id'] || $versus->team2_id==$data['team2_id']){
                    return redirect()->back()->with('error','Cette equipe a déja ete programmé pour cette date'.$data['date']);
           
                }
              }
            

            $data['date_match']=$data['date'];
            $this->teamRepository->create_match($data);
            return redirect()->back()->with('success', 'Match créé avec succès!');
        }
        return redirect()->back()->with('error', 'Erreur pendant la creation!');

    }

    
    public function f_creation(array $data)
    {
        $teamId = $data['team'];
        $event_base = ['team_id' => $teamId];
    
        if (isset($data['players']) && !empty($data['players'])) {
            $match_id = collect($data['players'])->pluck('match_id')->filter()->first();
            if ($match_id) {
                $event_base['match_id'] = $match_id;
    
                foreach ($data['players'] as $player) {
                    if (!empty($player['player_id'])) {
                        $player_id = $player['player_id'];
                        $event = $this->teamRepository->match_event_eachplayer($match_id, $teamId, $player_id);
                       
                        if (empty($event)) {
                             $team_cu=$this->teamById($teamId);
                             
                            $this->teamRepository->createEvent(array_merge($event_base, ['player_id' => $player_id]));
                            $team_cu['match_joues']=$this->teamRepository->playes($teamId);
                            
                            $this->teamRepository->updateTeam($teamId,$team_cu);//after
                             



                        }else{
                            $team_cu=$this->teamById($teamId);
                            $team_cu['match_joues']=$this->teamRepository->playes($teamId);
                           // dd($team_cu['match_joues']);
                            $this->teamRepository->updateTeam($teamId,$team_cu);
                              
                        }
                        $event = $this->teamRepository->match_event_eachplayer($match_id, $teamId, $player_id);
                      
                        if($player && !empty($match_id) && !empty($player['player_id'])){
                         if(!empty($player['carton']))
                         {
                            $event = $this->teamRepository->match_event_eachplayer($match_id, $teamId, $player['player_id']);
                      
                            if($player['carton']==="J"){
                                $event = $this->teamRepository->match_event_eachplayer($match_id, $teamId, $player['player_id']);
                      
                                $event['carton_jaune']+=1;
                                $this->teamRepository->updateEvent($player['match_id'],
                                $teamId,
                                $player['player_id'],
                                $event
                            );
                              
                            }
                             if($player['carton']==="R"){
                                $event = $this->teamRepository->match_event_eachplayer($match_id, $teamId, $player['player_id']);
                      
                                $event['carton_rouge']+=1;
                                $this->teamRepository->updateEvent($player['match_id'],
                                $teamId,
                                $player['player_id'],
                                $event
                            );
                            }
                            
                         }
                         if(!empty($player['goal']))
                         {
                             $event = $this->teamRepository->match_event_eachplayer($match_id, $teamId, $player['player_id']);
                             $team_e=$this->teamById($teamId);
                             $team2=$this->team2($teamId,$match_id);
                             $team_e['buts_marques']+=$player['goal'];
                             $team_e['differences_buts']=$team_e['buts_marques'] - $team_e['buts_encaissees'];
                              

                              $this->teamRepository->updateTeam($teamId,$team_e);//after
                             
                              
                              $team_u=$this->teamById($teamId);//after update
                              $team2['buts_encaissees']+=$player['goal'];
                              $team2['differences_buts']=$team2['buts_marques'] - $team2['buts_encaissees'];
                              
                              

                           
                                $event['but_marques']+=$player['goal'];
                                $this->teamRepository->updateEvent($player['match_id'],
                                $teamId,
                                $player['player_id'],
                                $event
                            );
                             $this->teamRepository->updateTeam($team2['id'],$team2);
                             $goals1=$this->teamRepository->goals($match_id,$teamId);
                            // dd($goals1);
                             $goals2=$this->teamRepository->goals($match_id,$team2['id']);
                            //dd($goals1,$goals2);
                           // dd($team_e->team_event);
                             $this->teamRepository->updateMatchResults(
                               
                                $this->teamRepository->team_event($match_id,$teamId),
                                $this->teamRepository->team_event($match_id,$team2['id']),
                                $goals1,
                                $goals2);
                           
                              
                            
                            
                         }
                         $team_e['nul']=$this->teamRepository->countNuls($teamId);
                         $team_e['defaites']=$this->teamRepository->countDefaites($teamId);
                         $team_e['victoires']=$this->teamRepository->countVictories($teamId);
                         $team2['nul']=$this->teamRepository->countNuls($team2['id']);
                         $team2['defaites']=$this->teamRepository->countDefaites($team2['id']);
                         $team2['victoires']=$this->teamRepository->countVictories($team2['id']);
                         $this->teamRepository->updateTeam($teamId,$team_e);//after
                         $this->teamRepository->updateTeam($team2['id'],$team2);//after
                                
                      
                        if(!empty($player['play']) ){
                            
                            
                            $player_e=$this->teamRepository->getPlayer($player['player_id']);
                            $player_e['match_joues']+=$player['play'];
                           
                            $this->teamRepository->updatePlayer($player_e['id'],$player_e);
                        
                        }
                         $event = $this->teamRepository->match_event_eachplayer($match_id, $teamId, 
                           $player_id);
                           $player_e=$this->teamRepository->getPlayer($player_id);
                           $player_e['buts_marques']=$event['but_marques'];
                           $player_e['cartons_rouges']=$event['carton_rouge'];
                           $player_e['cartons_jaunes']=$event['carton_jaune'];
                           $this->teamRepository->updatePlayer($player_id,$player_e);

                           
                           
                          
                       }
                       
                    }
                }
                    
               
            }
            return redirect()->back()->with('success','fiche mis a jours avec success');
        }
        return redirect()->back()->with('error','erreur inattendue');
    }
    
    
   public function findSmallestDate(array $dates)
{
    // Convertir les chaînes de date en objets DateTime pour comparaison
    $dateObjects = array_map(function($date) {
        return new \DateTime($date);
    }, $dates);

    // Trouver la date la plus petite
    $smallestDate = min($dateObjects);

    // Retourner la date au format original
    return $smallestDate->format('Y/m/d');
}
public function isDateValid($date)
{
    
    $inputDate = new \DateTime($date);

    
    $today = new \DateTime();

    
    return $inputDate >= $today;
}






    
    public function c_poule(array $data)
    {
        // Vérifier si la poule existe déjà
        if ($this->teamRepository->pouleExist($data['name'])) {
            return redirect()->back()->with('warning', 'Poule avec ce nom existe déjà');
        }
    
        // Créer la nouvelle poule
        $poule = $this->teamRepository->createPoule($data);
    
        // Vérifier si la création a réussi
        if ($poule) {
            return redirect()->back()->with('success', 'Poule créée avec succès');
        }
    
        // Si la création échoue
        return redirect()->back()->with('error', 'Erreur pendant la création');
    }
    

    public function getAllTeams()
    {
        return $this->teamRepository->getAll();
    }
    public function t_update(array $data)
    {
        
        $team = $this->teamRepository->find($data['team']);
    
      
        if ($team) {
            $rep = $this->teamRepository->find_r($team['representant_id']);
            
            if ($rep) {
                
                $team_a = is_array($team) ? $team : $team->toArray();
                
              
                $team_a['nom'] = $data['team-name'];
                $team_a['pseudo'] = $data['team-pseudo'];
    
              
                $rep_a = is_array($rep) ? $rep : $rep->toArray();
    
              
                $rep_a['nom'] = $data['team-representant'];
    
               $this->teamRepository->update_r($rep['id'], $rep_a);
               
              $this->teamRepository->update($team['id'], $team_a);
              
            
                return redirect()->back()->with('success', 'Mise à jour effectuée avec succès');
        
              
                
             }
        }
    
         return redirect()->back()->with('error', 'Une erreur est survenue pendant la mise à jour');
    }
    
    public function p_update(array $data)
    {
        // Trouver l'équipe
        $team = $this->teamRepository->find($data['team']);
        
        if ($team) {
            // Trouver le joueur
            $player = $this->teamRepository->find_p($data['player']);
            
            // Vérifier les joueurs de l'équipe
            $d_e = $this->teamRepository->getD($data['dorsa'], $team['players']);
            
            if ($player) {
                // Vérifier si un joueur avec le même 'dorsa' existe déjà dans l'équipe
                if ($d_e) {
                    return redirect()->back()->with('warning', 'Un joueur avec ce dorsa existe déjà dans cette équipe');
                } else {
                    // Convertir le joueur en tableau si ce n'est pas déjà un tableau
                    $p_a = is_array($player) ? $player : $player->toArray();
                    
                    // Mettre à jour le nom du joueur
                    $p_a['nom'] = $data['nom'];
                    $p_a['dorsa'] = $data['dorsa'];
    
                    // Mettre à jour le joueur dans le dépôt
                    $this->teamRepository->update_p($player['id'], $p_a);
    
                    // Redirection avec message de succès
                    return redirect()->back()->with('success', 'Mise à jour effectuée avec succès');
                }
            }
        }
    
        // Redirection en cas d'erreur
        return redirect()->back()->with('error', 'Une erreur est survenue pendant la mise à jour');
    }
    public function record(array $data){
        $this->teamRepository->createRecord($data);
        return redirect()->back()->with('success','Creaton effectuée avec success');
    }
    public function records(){
       return $this->teamRepository->records();
      
    }
    public function matchs()
    {
        $teams = collect(); 
        $records = $this->records();
    
        foreach ($records as $rc) {
            $match = $rc->match;
            if ($match) { // Vérifier si $match n'est pas null
                if ($match->team1) {
                    $team1 = $match->team1;
                    $team1['match_id'] = $rc->match_id; // Ajouter match_id à l'équipe
                    $teams->push($team1); // Ajouter l'équipe avec match_id à la collection
                }
                if ($match->team2) {
                    $team2 = $match->team2;
                    $team2['match_id'] = $rc->match_id; // Ajouter match_id à l'équipe
                    $teams->push($team2); // Ajouter l'équipe avec match_id à la collection
                }
            }
        }
    
        return $teams;
    }
    public function team2($team1_id,$match_id){
       // $team1=$this->teamById($team1);
       $team2_id=null;
        $match=$this->teamRepository->versusById($match_id);
        if($match->team1_id==$team1_id){
            $team2_id=$match->team2_id;
        }else{
            $team2_id=$match->team1_id;
        }
        return $this->teamById($team2_id);

    }
    public function team1($team1_id){
        
         return $this->teamById($team1_id);
 
     }
    

    
    public function but_carton(array $data)
    {
        // Trouver l'équipe
        $team = $this->teamRepository->find($data['team']);
    
        if ($team) {
            // Trouver le joueur dans l'équipe
            $p_e = $this->teamRepository->getP($data['player'], $team['players']);
    
            if ($p_e) {
                // Convertir le joueur en tableau si ce n'est pas déjà un tableau
                $p_e_a = is_array($p_e) ? $p_e : $p_e->toArray();
    
                // Incrémenter les statistiques du joueur
                if (isset($data['matches_played']) && $data['matches_played'] !== null) {
                    $p_e_a['match_joues'] = ($p_e_a['match_joues'] ?? 0) + $data['matches_played'];
                
                }
                if (isset($data['yellow_card']) && $data['yellow_card'] !== null)
                 {
                  
                    $p_e_a['cartons_jaunes'] = ($p_e_a['cartons_jaunes'] ?? 0) + $data['yellow_card'];
                    //dd($p_e_a);
                }
                if (isset($data['red_card']) && $data['red_card'] !== null) {
                    $p_e_a['cartons_rouges'] = ($p_e_a['cartons_rouges'] ?? 0) + $data['red_card'];
                }
                if (isset($data['goals']) && $data['goals'] !== null) {
                    $p_e_a['buts_marques'] = ($p_e_a['buts_marques'] ?? 0) + $data['goals'];
                }
    
                // Mettre à jour les données du joueur dans le dépôt
                $this->teamRepository->but_carton($p_e_a['id'], $p_e_a);
    
                // Retourner un message de succès
                return redirect()->back()->with('success', 'Sauvegarde effectuée avec succès.');
            }
    
            // Retourner un message d'erreur si le joueur n'est pas trouvé
            return redirect()->back()->with('error', 'Le joueur n\'a pas été trouvé.');
        }
    
        // Retourner un message d'erreur si l'équipe n'est pas trouvée
        return redirect()->back()->with('error', 'L\'équipe n\'a pas été trouvée.');
    }
    public function opponents($teams, $own)
    {
        $ops = new Collection();
        $tops = new Collection();
    
        // Parcourez les équipes pour ajouter les équipes adverses à la collection $ops
        foreach ($teams as $team) {
            if (!empty($team->oun_versus)) {
                $ops->push($team->oun_versus);
            }
        }
    
        // Filtrer les collections vides
        $ops = $ops->filter(function ($collection) {
            return $collection->isNotEmpty();
        });
    
        // Parcourez les collections et ajouter les adversaires à $tops
        foreach ($ops as $op) {
            foreach ($op as $o) {
                $opponentTeam = null;
    
                if ($o->team1_id == $own->id) {
                    $opponentTeam = $this->teamById($o->team2_id);
                } else {
                    $opponentTeam = $this->teamById($o->team1_id);
                }
    
                if ($opponentTeam) {
                    // Ajouter la clé `date_match` à l'équipe
                    $opponentTeam->date_match = $o->date_match;
                    $opponentTeam->heure_match = $o->heure_match;
                    $opponentTeam->match_id = $o->id;
                    $tops->push($opponentTeam);
                }
            }
        }
    
        // Filtrer les équipes pour supprimer l'équipe actuelle et retourner des équipes uniques par `id`
        return $tops->filter(function($team) use ($own) {
            return $team->id !== $own->id;
        })->unique('id');
    }
    
    
public function teamById($id)
{
    return $this->teamRepository->find($id);
}
    
    
    public function createTeam(array $data)
    {
        // dd($data);
        // Initialiser les tableaux de données
        $rep_data = [];
        $team_data = [];
    
        // Sauvegarder les images et récupérer leurs chemins
        $image_rep = $this->saveImage($data['rep-image']);
        
        $image_team = $this->saveImage($data['team-image']); 
        
   //  dd($image_rep,$image_team);
       
        if ($image_rep && $image_team) {
            // Préparer les données pour le représentant
            $rep_data['image'] = $image_rep;
            $rep_data['nom'] = $data['rep-name'];
    
            
            $new_rep = $this->repRepository->create($rep_data);
    
           
            $team_data['image'] = $image_team;
            $team_data['nom'] = $data['team-name'];
            $team_data['pseudo'] = $data['team-pseudo'];
            $team_data['representant_id'] = $new_rep->id;
           
    
            // Créer l'équipe
            $this->teamRepository->create($team_data);
    
            // Rediriger avec un message de succès
            return redirect()->back()->with('success', 'Team créé avec succès');
        }
    
        return redirect()->back()->with('error', 'Erreur lors de la création de l\'équipe. Veuillez réessayer.');
    }
    
   
    public function saveImage($image)
    {
        $folder = public_path('assets/images/uploads'); // Chemin vers storage/app/public/assets/images/uploads
    
        if ($image) {
            $fileName = 'ftb_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move($folder, $fileName); // Déplace le fichier vers le dossier de stockage
            return $fileName;
        }
    
        return null;
    }
    


    public function getTeamById($id)
    {
        return $this->teamRepository->find($id);
    }

    public function updateTeam($id, array $data)
    {
        return $this->teamRepository->update($id, $data);
    }

    public function deleteTeam($id)
    {
        return $this->teamRepository->delete($id);
    }
}
