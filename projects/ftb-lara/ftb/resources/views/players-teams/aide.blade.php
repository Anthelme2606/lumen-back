<div class="row row-cols-1 g-1 w-100">
    <div class="col-md-4">
        <x-form :title="'Enrégistrement de la team'" :route="route('store-team')" :name="'Team'" :keys="[
            [
                'label' => 'Nom de la team',
                'name' => 'team-name',
            ],
            [
                'label' => 'Pseudo de la team',
                'name' => 'team-pseudo',
            ],
            [
                'label' => 'Nom du représentant',
                'name' => 'rep-name',
            ],
        ]" :files="[
            [
                'label' => 'Team',
                'name' => 'team-image',
            ],
            [
                'label' => 'Coach',
                'name' => 'rep-image',
            ],
        ]"
            :coach="'coach'" :rep="'rep'" />

       
    </div>
    


    <div class="col-md-4">

        <x-form :route="route('store-player')" 
        :title="'Enrégistrement du joueur'" 
        :name="'Joueur'"
        :select="$teams"
        :keys="[
            [
                'label' => 'Nom du joueur',
                'name' => 'nom',
            ],
            [
                'label' => 'Dorsa',
                'name' => 'dorsa',
            ],
        ]" 
        :files="[
            [
                'label' => 'Joueur',
                'name' => 'logo',
            ],
        ]" />

      
    </div>
    <div class="col-md-4">
        <div class="card card-height">
            <div class="card-header d-flex justify-content-center align-items-center flex-column ">
                <h4> des images équipe/joueur</h4>
                <div class="d-flex justify-content-between align-items-center w-100">
                    <button class="btn btn-warning btn-active px-4 py-2 mx-2 text-white">Equipe</button>
                    <button class="btn btn-warning px-4 py-2 mx-2 text-white">Joueur</button>
                </div>
            </div>
            <div class="card-body d-flex justify-content-center align-items-center flex-column">
                {{-- <form id="imageForm-2" action="{{ route('store-player') }}" method="post" enctype="multipart/form-data">
                 @csrf
                    <div class="mb-2">
                        <select class="my-select" name="team">
                            <option disabled selected value="Selectionne la team ">Selectionne la team</option>
                           @if (isset($players))
                           @foreach ($players as $pl)
                            <option value="{{$pl['id']}}">{{$pl['nom']}}</option>
                          @endforeach
                            @endif
                        </select>

                    </div>
                    <div class="mb-2">
                        <input name="nom" class="w-100 px-2 rounded input-team  " placeholder="Nom du joeur">

                    </div>
                    <div class="mb-2">
                        <input name="dorsa" class="w-100 px-2 rounded input-team  " placeholder="Dorsa ..">

                    </div>
                    <div class="mb-2">
                        <div class="file-upload-wrapper">
                            <div class="file-upload-input" data-placeholder=" logo du joueur"></div>
                            <input type="file" name='logo' class="file-upload-hidden" onchange="updateFileName(this)">
                        </div>
                    </div>

                    <div class="mb-2 d-flex justify-content-center">
                        <button type="submit" class="px-4 py-2 rounded btn but-primary">Enregister
                            Joueur</button>
                    </div>

                </form> --}}
                <div
                    class="team-or-player d-flex flex-column justify-content-center align-items-center w-100 mb-2">
                    <select class="my-select w-100 mb-2 " name="team">
                        <option disabled selected value="Selectionne la team ">Selectionne la team</option>
                        @if (isset($teams))
                            @foreach ($teams as $tm)
                                <option value="{{ $tm->id }}">{{ $tm['nom'] }}</option>
                            @endforeach
                        @endif
                    </select>
                    <select class="my-select w-100 mb-2 " name="player">
                        <option disabled selected value="Selectionne le joueur ">Selectionne le joueur</option>
                        @if (isset($teams))
                            @foreach ($teams as $tm)
                                @if ($tm->players)
                                    @foreach ($tm->players as $player)
                                        @if ($player->team)
                                            <option value="{{ $player['id'] }}"
                                                data-team-player="{{ $player->team->id }}">{{ $player['nom'] }}
                                            </option>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="upload-container position-relative"
                    onclick="document.getElementById('file-input').click();">
                    <img id="upload-preview" src="{{ asset('assets/images/drop-1.png') }}" class="img-fluid">
                    <span class="image-loading position-absolute " id="image-loading"></span>
                </div>
                <input type="file" id="file-input" accept="image/*" onchange="uploadImage(event)">

            </div>
        </div>
    </div>
</div>
<div class="row row-cols-1 g-1 w-100 mt-1">
    <div class="col-md-4">
        <x-form :title="'Mise à jour de la team'"
        :route="route('t_update')"
        :ms_team="$teams"
        :name="'Update1'"
        
        />
       
    </div>
    <div class="col-md-4">
        <x-form :title="'Mise à jour du joueur'"
        :route="route('p_update')"
        :ms_player="$teams"
        :name="'Update2'"
        
        />
       
    </div>
    <div class="col-md-4">
        <x-form
        :route="route('but_carton')"
        :title="'Buts marqués & Cartons'"
        :ms_team_player="$teams"
        :name="'Enrégistrement1'"
        />
        
    </div>
</div>
<!--creation de poules-->
@php
    $poules = [
        'A',
        'B',
        'C',
        'D',
        'E',
        'F',
        'G',
        'H',
        'I',
        'J',
        'K',
        'L',
        'M',
        'N',
        'O',
        'P',
        'Q',
        'R',
        'S',
        'T',
        'U',
        'V',
        'W',
        'X',
        'Y',
        'Z',
    ];
@endphp
<div class="row row-cols-1 g-1 w-100 mt-1">
    <div class="col-md-2">
        <div class="card card-height">
            <div class="card-header d-flex justify-content-center align-items">
                <h4>Création de poule</h4>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-2">
                        <select class="my-select">
                            <option disabled selected value="creation de poule">Creéation de poule</option>
                            @foreach ($poules as $poule)
                                <option value="Poule {{ $poule }}">Poule {{ $poule }}</option>
                            @endforeach

                        </select>

                    </div>


                    <div class="mb-2 d-flex justify-content-center">
                        <button type="submit" class="px-4 py-2 rounded btn but-primary">Création..</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card card-height">
            <div class="card-header d-flex justify-content-center align-items">
                <h4>Ajout des équipes </h4>
            </div>
            <div class="card-body flex-grow-1 d-flex flex-column">
                <div class="man-ou-auth d-flex justify-content-between align-items-center">
                    <button id="manuelBtn"
                        class="px-2 mx-2 border-0 btn btn-solo btn-active py-2">Manuel</button>
                </div>
                <div>
                    <div class="flex-grow-1 d-flex flex-column">
                        <!--team1-->
                        <div class="row g-1 w-100">
                            <div class="col-5 col-md-4 mx-auto d-flex flex-column flex-grow-1 height-100">
                                <div
                                    class="card flex-grow-1 d-flex justify-content-center align-items-center flex-column">
                                    <div class="card-body">
                                        <div class="dropdown">
                                            <button class="dropdown-btn bg-success">
                                                Poule A
                                                <span class="mdi mdi-dots-vertical text-white"></span>
                                            </button>
                                            <div class="dropdown-content">
                                                <a class="text-primary text-center "
                                                    href="#">Ajouter</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-7 col-md-8 mx-auto d-flex flex-column flex-grow-1 height-100">
                                <div class="row w-100 g-1 row-cols-1 row-cols-md-3">
                                    <div class="col mx-auto d-flex flex-column flex-grow-1 height-1001">
                                        <div
                                            class="card flex-grow-1 d-flex justify-content-center align-items-center flex-column">
                                            <div class="card-body">
                                                <div class="dropdown">
                                                    <button class="dropdown-btn">
                                                        Talent
                                                        <span class="mdi mdi-dots-vertical text-white"></span>
                                                    </button>
                                                    <div class="dropdown-content">
                                                        <a class="text-danger text-center"
                                                            href="#">Retirer</a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mx-auto d-flex flex-column flex-grow-1 height-100">
                                        <div
                                            class="card flex-grow-1 d-flex justify-content-center align-items-center flex-column">
                                            <div class="card-body">
                                                <div class="dropdown">
                                                    <button class="dropdown-btn">
                                                        Talent
                                                        <span class="mdi mdi-dots-vertical text-white"></span>
                                                    </button>
                                                    <div class="dropdown-content">
                                                        <a class="text-danger text-center"
                                                            href="#">Retirer</a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mx-auto d-flex flex-column flex-grow-1 height-100">
                                        <div
                                            class="card flex-grow-1 d-flex justify-content-center align-items-center flex-column">
                                            <div class="card-body">
                                                <div class="dropdown">
                                                    <button class="dropdown-btn">
                                                        Talent
                                                        <span class="mdi mdi-dots-vertical text-white"></span>
                                                    </button>
                                                    <div class="dropdown-content">
                                                        <a class="text-danger text-center"
                                                            href="#">Retirer</a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
            
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <x-form
        :select1="$teams"
        :title="'Création de match'"
        :name="'creation-match'"
        :match_keys="[
            [
                'label' => 'Date du match',
                'name' => 'date_match',
            ],
            [
                
                'heure' => 'heure_match',
            ],
             [
                
                'minute' => 'minute_match',
            ],
        ]" 
        :select2="'$teams'"

        />
        {{-- <div class="card card-height">
            <div class="card-header d-flex justify-content-center align-items">
                <h4>Création de match</h4>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-2">
                        <select class="my-select">
                            <option disabled selected value="Premier team">Premiere team</option>
                            @if(isset($teams) && $teams!==null)
                            @foreach($teams as $team)
                            <option value="{{$team['nom']}}">{{$team['nom']}}</option>
                            @endforeach
                            @endif
                        </select>

                    </div>
                    <div class="mb-2">
                        <input type="date" class="w-100 px-2 rounded input-team  "
                            placeholder="date du match">

                    </div>
                    <div class="mb-2">
                        <input type="number" class="w-100 px-2 rounded input-team  "
                            placeholder="temps de jeu" min="0">

                    </div>
                    <div class="mb-2">
                        <div class="form-group">
                            <label for="time">Heure:</label>
                            <div class="time-input">
                                <input type="text" id="hours" class="input-team" maxlength="2"
                                    placeholder="hh">
                                <span>:</span>
                                <input type="text" id="minutes" class="form-control" maxlength="2"
                                    placeholder="mm">
                            </div>
                        </div>

                    </div>

                    <div class="mb-2">
                        <select class="my-select">
                            <option disabled selected value="Second team">Seconde team</option>
                            @if(isset($teams) && $teams!==null)
                            @foreach($teams as $team)
                            <option value="{{$team['nom']}}">{{$team['nom']}}</option>
                            @endforeach
                            @endif
                        </select>

                    </div>




                    <div class="mb-2 d-flex justify-content-center">
                        <button type="submit" class="px-4 py-2 rounded btn but-primary">Match..</button>
                    </div>

                </form>
            </div>
        </div> --}}
    </div>
</div>
@if(isset($teams))
<div class="row g-0 w-100 mt-1">
    <div class="col-md-12 mx-auto d-flex flex-column flex-grow-1 height-100">
        <div class="card flex-grow-1">
            <div class="d-flex justify-content-center align-items-center">Fiche de match</div>

            <!-- Sélecteur d'équipe -->
            <select id="team-select-four" class="my-select">
                <option disabled selected value="">Sélectionnez l'équipe</option>
                @foreach($teams as $team)
                    <option value="{{$team->nom}}" data-players="{{ json_encode($team['players']) }}">
                        {{$team->nom}}
                    </option>
                @endforeach
            </select>

            <!-- Formulaire de joueurs -->
            <form id="players-form">
                <div class="table-responsive">
                    <table class="table" id="players-table">
                        <thead>
                            <tr>
                                <th scope="col">Joueur</th>
                                <th scope="col">CJ</th>
                                <th scope="col">CR</th>
                                <th scope="col">Play</th>
                                <th scope="col">But</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Les lignes de joueurs seront ajoutées ici dynamiquement -->
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn but-primary">Soumettre</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif