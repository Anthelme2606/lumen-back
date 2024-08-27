<?php
namespace App\Services;

use App\Repositories\PlayerRepository;
use App\Repositories\TeamsRepositories\TeamRepository;

class PlayerService
{
    protected $playerRepository;
    protected $tm;

    public function __construct(PlayerRepository $PlayerRepository,
    TeamRepository $team)
    {
        $this->tm=$team;
        $this->playerRepository = $PlayerRepository;
    }

    public function getAllPlayers()
    {
        return $this->playerRepository->getAll();
    }

    public function createPlayer(array $data)
    {
       
        $p_data = [];
    
        // Sauvegarder les images et récupérer leurs chemins
        $image_p = $this->saveImage($data['logo']);
         $team=$this->tm->find($data['team']);
        if(!$team){
            return redirect()->back()->width('error','La team specifié nexiste pas');
        }
    
       
        if ($image_p ) {
            
            $p_data['logo'] = $image_p;
            $p_data['nom'] = $data['nom'];
            $p_data['dorsa'] = $data['dorsa'];
            $p_data['team_id'] = $team->id;
    
           
            $this->playerRepository->create($p_data);
    
            // Rediriger avec un message de succès
            return redirect()->route('team-player')->with('success', 'Player créé avec succès');
        }
    
        return redirect()->back()->with('error', 'Erreur lors de la création ddu joueur. Veuillez réessayer.');
   
    }
    public function saveImage($image)
{
   
        $folder='assets/images/uploads';
        if($image){
        
        $fileName =  'ftb' . '_' .time().'.'.$image->getClientOriginalExtension();
         $image->move($folder,$fileName);
        return $fileName;
    }

    return null;
}

    public function getPlayerById($id)
    {
        return $this->playerRepository->find($id);
    }

    public function updatePlayer($id, array $data)
    {
        return $this->playerRepository->update($id, $data);
    }

    public function deletePlayer($id)
    {
        return $this->playerRepository->delete($id);
    }
}
