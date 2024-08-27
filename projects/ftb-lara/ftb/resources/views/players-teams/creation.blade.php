@extends('layouts.index')
@section('title', 'Teams-Players')
@section('sidebar')
    <x-sidebar />
@endsection
@section('container')
<style>
    .round-background {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background-color: #d4edda; /* Vert clair */
        margin: 0 auto;
    }
    .card-title {
        text-align: center;
        margin-top: 10px;
    }
    .hero-container{
        width:100%;
        margin:0;
        padding:0;
        background-color: #4CAF50 ;
       
    }
   .ours-h {
    text-align:center;
    display:flex;
    justify-content:center;
    color:#fff;
    width: 100%;
   
}
.ours-h span{
    color:white;
    font-size:26px;
    font-weight:bold;
}

</style>
    <div class="dashboard">
        <div class="content mt-1">
            <div class="hero-container">
                <div class="ours-h">
                    <span>Gestionnaire</span>

                </div>
                <svg 
                xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 1440 320"><path fill="#f5f6fa" fill-opacity="1" d="M0,160L80,176C160,192,320,224,480,213.3C640,203,800,149,960,117.3C1120,85,1280,75,1360,69.3L1440,64L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
                    </path></svg>


            </div>
            {{-- <div class="row row-cols-1 g-0 w-100 mb-1 ">
                <div class="col-md-6  mx-auto height-100 flex-grow-1 d-flex flex-column">
                    <div class="card   flex-grow-1">
                        <div class="card-body">
                            <img class="img-fluid" src="{{ asset('assets/images/soccer-login.png') }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6  mx-auto d-flex flex-column flex-grow-1 height-100">
                    <div class="card   flex-grow-1">
                        <div class="card-body">
                            <img class="img-fluid" src="{{ asset('assets/images/soccer.png') }}">
                        </div>
                    </div>
                </div>
            </div> --}}
          
                    <div class="row row-cols-2 row-cols-md-3 g-1 mb-2 w-100">
                        <!-- Card 1 -->
                        <div class="col">
                            <div class="card card-height" data-bs-toggle="modal" data-bs-target="#teamModal">
                                <div class="card-body text-center">
                                    <div class="round-background">
                                        <span class="mdi mdi-account-group mdi-36px text-primary"></span>
                                    </div>
                                    <h5 class="card-title">Création d'équipe</h5>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Card 2 -->
                        <div class="col">
                            <div class="card card-height" data-bs-toggle="modal" data-bs-target="#equipeModal">
                                <div class="card-body text-center">
                                    <div class="round-background">
                                        <span class="mdi mdi-account-plus mdi-36px text-primary"></span>
                                    </div>
                                    <h5 class="card-title">Création de joueur</h5>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Card 3 -->
                        <div class="col">
                            <div class="card card-height"
                             data-bs-toggle="modal" data-bs-target="#ajoutMatchModal">
                                <div class="card-body text-center">
                                    <div class="round-background">
                                        <span class="mdi mdi-calendar-check-outline mdi-36px text-primary"></span>
                                    </div>
                                    <h5 class="card-title">Programmer un match</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card card-height"
                             data-bs-toggle="modal" data-bs-target="#match_aujModal">
                                <div class="card-body text-center">
                                    <div class="round-background">
                                        <span class="mdi mdi-trophy-outline mdi-36px text-primary"></span>
                                    </div>
                                    <h5 class="card-title">Match Aujourd'hui</h5>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Card 4 -->
                        <div class="col">
                            <div class="card card-height" data-bs-toggle="modal" data-bs-target="#pouleModal">
                                <div class="card-body text-center">
                                    <div class="round-background">
                                        <span class="mdi mdi-format-list-bulleted mdi-36px text-primary"></span>
                                    </div>
                                    <h5 class="card-title">Création de poule</h5>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Card 5 -->
                        <div class="col">
                            <div class="card card-height" data-bs-toggle="modal" data-bs-target="#poule-team-Modal">
                                <div class="card-body text-center">
                                    <div class="round-background">
                                        <span class="mdi mdi-account-multiple-plus mdi-36px text-primary"></span>
                                    </div>
                                    <h5 class="card-title">Ajout de team au poule</h5>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Card 6 -->
                        <div class="col">
                            <div class="card card-height" data-bs-toggle="modal" data-bs-target="#ficheModal">
                                <div class="card-body text-center">
                                    <div class="round-background">
                                        <span class="mdi mdi-file-document-outline  mdi-36px text-primary"></span>
                                    </div>
                                    <h5 class="card-title">Remplir la fiche de match Debut-Fin</h5>
                                </div>
                            </div>
                        </div>
                
                    <div class="col">
                        <div class="card card-height" data-bs-toggle="modal" data-bs-target="#updateEquipe">
                            <div class="card-body text-center">
                                <div class="round-background">
                                    <span class="mdi mdi-update mdi-36px text-primary"></span>
                                </div>
                                <h5 class="card-title">Mise à jour des équipes</h5>
                            </div>
                        </div>
                    </div>
                
                <div class="col">
                    <div class="card card-height" data-bs-toggle="modal" data-bs-target="#updatePlayer">
                        <div class="card-body text-center">
                            <div class="round-background">
                                <span class="mdi mdi-account-edit mdi-36px text-primary"></span>
                            </div>
                            <h5 class="card-title">Mise à jour des joueurs</h5>
                        </div>
                    </div>
                </div>
            
            <div class="col">
                <div class="card card-height" data-bs-toggle="modal" data-bs-target="#carton-but">
                    <div class="card-body text-center">
                        <div class="round-background">
                            <span class="mdi mdi-card-account-details mdi-36px text-primary"></span>
                        </div>
                        <h5 class="card-title">Cartons && Buts  ..</h5>
                    </div>
                </div>
            </div>
        </div>
        
                
            
              
               @include('players-teams.team',['teams'=>$teams])
               @include('players-teams.player',['teams'=>$teams])
               @include('players-teams.update-team',['teams'=>$teams])
               @include('players-teams.update-player',['teams'=>$teams])
               @include('players-teams.carton-but',['teams'=>$teams])
               @include('players-teams.poule')
              
               @include('players-teams.match',['teams'=>$teams])
               @include('players-teams.fiche',['teams'=>$teams,'records'=>$records])
               @include('players-teams.poule-team',['poules'=>$poules,'teams'=>$teams])
               @include('players-teams.records',['teams'=>$teams])
            
               
                
            
               
            
                <!-- Modal 4: Création de poule -->
                <div class="modal fade" id="pouleModal" tabindex="-1" aria-labelledby="pouleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="pouleModalLabel">Création de poule</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="pouleName" class="form-label">Nom de la poule</label>
                                        <input type="text" class="form-control" id="pouleName" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Créer la poule</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Modal 5: Ajout de team au poule -->
                <div class="modal fade" id="ajoutTeamModal" tabindex="-1" aria-labelledby="ajoutTeamModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ajoutTeamModalLabel">Ajout de team au poule</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="selectPoule" class="form-label">Sélectionner une poule</label>
                                        <select class="form-select" id="selectPoule" required>
                                            <option value="">Sélectionnez une poule</option>
                                            <option value="1">Poule A</option>
                                            <option value="2">Poule B</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="selectTeam" class="form-label">Sélectionner une équipe</label>
                                        <select class="form-select" id="selectTeam" required>
                                            <option value="">Sélectionnez une équipe</option>
                                            <option value="1">Équipe 1</option>
                                            <option value="2">Équipe 2</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Ajouter l'équipe à la poule</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Modal 6: Ajout de joueur au team -->
                
            
            
        
        </div>
    </div>
    {{-- <script>
       
            const teamSelect4 = document.getElementById('team-select-four');
            const playersTableBody = document.querySelector('#players-table tbody');
        
            teamSelect4.addEventListener('change', function() {
                const selectedOption = teamSelect4.options[teamSelect4.selectedIndex];
                const players = JSON.parse(selectedOption.getAttribute('data-players'));
        
                // Réinitialiser le tableau des joueurs
                playersTableBody.innerHTML = '';
        
                players.forEach(player => {
                    const row = document.createElement('tr');
        
                    // Nom du joueur
                    const nameCell = document.createElement('td');
                    const nameInput = document.createElement('input');
                    nameInput.type = 'text';
                    nameInput.readOnly = true;
                    nameInput.className = 'form-control';
                    nameInput.name = 'nom_joueur';
                    nameInput.value = player.nom +' '+ player.dorsa;
                    nameCell.appendChild(nameInput);
        
                    // Carton Jaune
                    const yellowCardCell = document.createElement('td');
                    const yellowCardInput = document.createElement('input');
                    yellowCardInput.type = 'checkbox';
                    yellowCardInput.className = 'form-check-input';
                    yellowCardInput.name = 'carton_jaune';
                    yellowCardCell.className = 'text-center';
                    yellowCardCell.appendChild(yellowCardInput);
        
                    // Carton Rouge
                    const redCardCell = document.createElement('td');
                    const redCardInput = document.createElement('input');
                    redCardInput.type = 'checkbox';
                    redCardInput.className = 'form-check-input';
                    redCardInput.name = 'carton_rouge';
                    redCardCell.className = 'text-center';
                    redCardCell.appendChild(redCardInput);
        
                    // Match joué
                    const playCell = document.createElement('td');
                    const playInput = document.createElement('input');
                    playInput.type = 'checkbox';
                    playInput.className = 'form-check-input';
                    playInput.name = 'play';
                    playCell.className = 'text-center';
                    playCell.appendChild(playInput);
        
                    // But
                    const goalCell = document.createElement('td');
                    const goalInput = document.createElement('input');
                    goalInput.type = 'number';
                    goalInput.className = 'form-control';
                    goalInput.name = 'but';
                    goalInput.min = '0';
                    goalCell.appendChild(goalInput);
        
                    // Ajouter les cellules à la ligne
                    row.appendChild(nameCell);
                    row.appendChild(yellowCardCell);
                    row.appendChild(redCardCell);
                    row.appendChild(playCell);
                    row.appendChild(goalCell);
        
                    // Ajouter la ligne au tableau
                    playersTableBody.appendChild(row);
                });
            });
       
        </script> --}}
     <link rel="stylesheet" href="{{ asset('assets/css/team-player.css') }}">

     @endsection
