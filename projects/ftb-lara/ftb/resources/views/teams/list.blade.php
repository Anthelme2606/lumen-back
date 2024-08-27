@extends('layouts.index')
@section('title','Teams')
@section('sidebar')
<x-sidebar/>
@endsection
@section('container')
<div class="dashboard">
<div class="content mt-1">
@if(isset($teams))
@foreach($teams as $team)
<div class="row row-cols-1 g-1 w-100 mb-1">
 
    <div class="col-md-8 mx-auto  height-100">
        <div class="card  text-white ">
            <div class="card-header d-flex flex-column justify-content-center">
                <div class="team-logo-parent">
                    <div class="team-logo">
                        <img class="img-fluid" src="{{asset('assets/images/logo1.png')}}" alt="Team Logo">
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-2 align-items-center">
                    <span class="px-2 rounded bg-success text-white">{{$team['nom']}}</span>
                    <span class="d-flex justify-content-center align-items-center">
                        <div class="round-1">
                            <div class="round-2">
                                <img class="img-fluid" src="{{asset('assets/images/uploads/'.$team->representant->image)}}">
                            </div>
                        </div>
                        <h6 class="mx-1">Coach:{{$team->representant->nom}}</h6>
                    </span>
                    <select class="-select px-4 rounded border-blue outline-none" name="players">
                        <option value="4">4</option>
                        <option value="18">18</option>
                    </select>
                </div>
            </div>
            <div class="card-body d-flex justify-content-center align-items-center">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Dorsa</th>
                                <th>Photo</th>
                                <th>Nom Joueur</th>
                                
                                <th>Match joué</th>
                                <th>Carton jaune</th>
                                <th>Carton rouge</th>
                                <th>Buts</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($team->players as $player)
                             <tr>
                                <td>{{$player['dorsa']}}</td>
                                 <td class="d-flex justify-content-center align-items-center">
                                    <div class="round-1">
                                        <div class="round-2">
                                            <img class="img-fluid" src="{{asset('assets/images/uploads/'.$player['logo'])}}">
                                        </div>
                                    </div>
                                </td>
                                <td>{{$player['nom']}}</td>
                                <td>{{$player['match_joues']}}</td>
                                <td>{{$player['cartons_jaunes']}}</td>
                                <td>{{$player['cartons_rouges']}}</td>
                                <td>{{$player['buts_marques']}}</td>
                            </tr>
                           @endforeach
                          
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<div class="col-md-4 mx-auto height-100 ">
<div class="matchs d-flex flex-column">
    <div class="card mb-1  ">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div class="team d-flex justify-content-center align-items-center ">
            <div class="team-text">
                <span class="px-2 rounded bg-white text-primary">Talent </span>
             </div>
             <div class="team-l1">
                <div class="team-l2">
                <img class="img-fluid" src="{{asset('assets/images/logo1.png')}}">
                </div>
             </div>
           </div>
           <div class="versus-time d-flex flex-column justify-content-center align-items-center">
            <div class="date-play">
                <h5 class="small-text">Samedi,21 2024. 14:00</h5></div>
            <div class="text">
            <strong>VS</strong>
            </div>
            <div class="score">
                <span>0:0</span>
            </div>
           </div>
           <div class="team d-flex justify-content-center align-items-center ">
            
             <div class="team-l1">
                <div class="team-l2">
                <img class="img-fluid" src="{{asset('assets/images/logo1.png')}}">
                </div>
             </div>
             <div class="team-text">
                <span class="px-2 rounded bg-white text-primary">Talent</span>
             </div>
           </div>
        </div>
    </div>
    <div class="card mb-1 ">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div class="team d-flex justify-content-center align-items-center ">
            <div class="team-text">
                <span class="px-2 rounded bg-white text-primary">Talent</span>
             </div>
             <div class="team-l1">
                <div class="team-l2">
                <img class="img-fluid" src="{{asset('assets/images/logo1.png')}}">
                </div>
             </div>
           </div>
           <div class="versus-time d-flex flex-column justify-content-center align-items-center">
            <div class="date-play"><h5 class="small-text">Samedi,21 2024. 14:00</h5></div>
            <div class="text">
            <strong>VS</strong>
            </div>
            <div class="score">
                <span>0:0</span>
            </div>
           </div>
           <div class="team d-flex justify-content-center align-items-center ">
            
             <div class="team-l1">
                <div class="team-l2">
                <img class="img-fluid" src="{{asset('assets/images/logo1.png')}}">
                </div>
             </div>
             <div class="team-text">
                <span class="px-2 rounded bg-white text-primary">Talent</span>
             </div>
           </div>
        </div>
    </div>
    <div class="card mb-1 ">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div class="team d-flex justify-content-center align-items-center ">
            <div class="team-text">
                <span class="px-2 rounded bg-white text-primary">Talent</span>
             </div>
             <div class="team-l1">
                <div class="team-l2">
                <img class="img-fluid" src="{{asset('assets/images/logo1.png')}}">
                </div>
             </div>
           </div>
           <div class="versus-time d-flex flex-column justify-content-center align-items-center">
            <div class="date-play"><h5 class="small-text">Samedi,21 2024. 14:00</h5></div>
            <div class="text">
            <strong>VS</strong>
            </div>
            <div class="score">
                <span>0:0</span>
            </div>
           </div>
           <div class="team d-flex justify-content-center align-items-center ">
            
             <div class="team-l1">
                <div class="team-l2">
                <img class="img-fluid" src="{{asset('assets/images/logo1.png')}}">
                </div>
             </div>
             <div class="team-text">
                <span class="px-2 rounded bg-white text-primary">Talent</span>
             </div>
           </div>
        </div>
    </div>
</div>
</div>
</div>
@endforeach
@endif

</div>
</div>
<link rel="stylesheet" href="{{asset('assets/css/teams.css')}}">
@endsection
