<?php

namespace App\Http\Controllers\Teams;

use Illuminate\Http\Request;
use App\Services\TeamServices\TeamService;
use App\Services\PlayerService;
class TeamController
{
    protected $teamService;
    protected $player_s;
    public function __construct(TeamService $t_s, PlayerService $p_s){
        $this->teamService=$t_s;
        $this->player_s=$p_s;
    }
    public function index(){
        $teams=$this->teamService->getAllTeams();
        return view('teams.list',compact('teams'));
    }


    // public function __construct(TeamService $teamService)
    // {
    //     $this->teamService = $teamService;
    // }

    // public function index()
    // {
    //     $teams = $this->teamService->getAllTeams();
    //     return response()->json($teams);
    // }

    public function store(Request $request)
    {
         // dd($request);
        $request->validate([
          'team-image' => 'file|required',
          'rep-image' =>'file|required',
          'rep-name' =>'string | required',
          'team-pseudo' => 'string| required',
          'team-name' => 'string | required'
        ]);
       
        //dd($request);
        return $this->teamService->createTeam($request->all());
        
    }

    public function show($id)
    {
        $team = $this->teamService->getTeamById($id);
        if (!$team) {
            return response()->json(['message' => 'Team not found'], 404);
        }
        return response()->json($team);
    }

    public function update(Request $request, $id)
    {
        $team = $this->teamService->updateTeam($id, $request->all());
        if (!$team) {
            return response()->json(['message' => 'Team not found'], 404);
        }
        return response()->json($team);
    }

    public function destroy($id)
    {
        $deleted = $this->teamService->deleteTeam($id);
        if (!$deleted) {
            return response()->json(['message' => 'Team not found'], 404);
        }
        return response()->json(['message' => 'Team deleted successfully']);
    }
}
