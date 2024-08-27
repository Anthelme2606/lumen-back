@extends('layouts.index')
@section('title','Dashboard')
@section('sidebar')
<x-sidebar/>
@endsection
@section('container')

<div class="dashboard">
    <div class="content">
     
      <div class="row g-1 w-100">

        <div class="col-md-9 colonne px-1">
          {{-- <div class="titre d-flex justify-content-center align-items-center">
            <h5 class="text-pretty text-center">Match en cours</h5>
          </div> --}}
          @if(isset($match))
          <div class="card mb-1 current-match-live">
            <div class="card-body team-a-vs-b 
            d-flex align-items-center justify-content-between position-relative z-1">
              @if(isset($match->team1))
            <div class="team-1">
                <div class="team-name">
                  <div class="t-name">{{$match->team1->pseudo}}</div>
                  <div class="t-point">{{$match->team1->defaites*1 + $match->team1->victoires*3 }} point(s)</div>
                </div>
                <div class="team-logo">
                  <div class="round-50-team">
                    @if(isset($match->team1->image))
                    <img src="{{asset('assets/images/uploads/'.$match->team1->image ?? 'logo1.png')}}" class="img-fluid" alt="" />
                  
                  @else
                  <img src="{{asset('assets/images/logo1.png')}}" class="img-fluid" alt="" />
                  
                  @endif
                  </div>
                </div>
              </div>
              @endif
              <div class="versus-time position-relative">
                <div class="match-ps">
                  <span>Vs</span>
                </div>
                <div class="match-time">
                  <span class="fw-bold">{{$match->heure_match ?? '15:00'}}</span>
                </div>
                <div class="match-date">
                  <span>{{$match->date_match  ?? 'Date à venir'}}</span>
                </div>
              </div>
              @if(isset($match->team2))
              <div class="team-2">
                <div class="team-logo">
                  <div class="round-50-team">
                    @if(isset($match->team2->image))
                    <img src="{{asset('assets/images/uploads/'.$match->team2->image ?? 'logo1.png')}}" class="img-fluid" alt="" />
                  
                  @else
                  <img src="{{asset('assets/images/logo1.png')}}" class="img-fluid" alt="" />
                  
                  @endif 
                </div>
                </div>
                <div class="team-name">
                  <div class="t-name">{{$match->team2->pseudo}}</div>
                  <div class="t-point">{{$match->team2->defaites*1 + $match->team2->victoires*3 }} point(s)</div>
                </div>
              </div>
              @endif
            </div>
          </div>
          @endif
          <div class="titre d-flex justify-content-center align-items-center">
            <h5 class="text-pretty text-center">Historique des matchs</h5>
          </div>
          <div class="row row-cols-1 g-1 row-cols-md-3 ">
            <div class="col match-list px-1">
              <div class="card  match-li">
                <div class="card-header d-flex flex-column">
                  <div class="match-mt live">Live</div>
                  <div class="teams d-flex">
                    <div class="team-s">
                      <div class="round-50-tea">
                        <img src="{{asset('assets/images/logo1.png')}}" class="img-fluid" alt="" />
                      </div>
                    </div>
                    <div class="team-s">
                      <div class="round-50-tea">
                        <img src="{{asset('assets/images/logo1.png')}}" class="img-fluid" alt="" />
                      </div>
                    </div>
                  </div>
                  <div class="where">Tournoi de maya kopé.</div>
                  <div class="vs-team d-flex flex-column">
                    <div class="winner d-flex justify-content-between">
                      <span>Liverpool</span>
                      <span class="score">3</span>
                    </div>
                    <div class="loser d-flex justify-content-between">
                      <span>Arsenal</span>
                      <span class="score">2</span>
                    </div>
                  </div>
                </div>
                <div class="card-body  fields  d-flex justify-content-center align-items-center flex-column">
                  <div id="teamH" class="teamH"></div>
                  <div id="teamA" class="py-2 teamA"></div>
                </div>
              </div>
            </div>
            
            <div class="col match-list">
              <div class="card match-li">
                  <div class="card-header d-flex flex-column">
                      <div class="match-mt finished">Terminé</div>
                      <div class="teams d-flex">
                          <div class="team-s">
                              <div class="round-50-tea">
                                  <img src="{{asset('assets/images/logo1.png')}}" class="img-fluid" alt="" />
                              </div>
                          </div>
                          <div class="team-s">
                              <div class="round-50-tea">
                                  <img src="{{asset('assets/images/logo1.png')}}" class="img-fluid" alt="" />
                              </div>
                          </div>
                      </div>
                      <div class="where">Tournoi de maya kopé.</div>
                      <div class="vs-team d-flex flex-column">
                          <div class="winner d-flex justify-content-between">
                              <span>Liverpool</span>
                              <span class="score">3</span>
                          </div>
                          <div class="loser d-flex justify-content-between">
                              <span>Arsenal</span>
                              <span class="score">2</span>
                          </div>
                      </div>
                  </div>
                  <div class="card-body  d-flex flex-column justify-content-center align-items-center">
                      <div class="rounded-team-image">
                          <img src="{{asset('assets/images/team.png')}}" class="img-fluid" alt="" />
                      </div>
                      <div class="rounded-team-image">
                          <img src="{{asset('assets/images/team.png')}}" class="img-fluid" alt="" />
                      </div>
                  </div>
              </div>
          </div>
          <div class="col match-list">
              <div class="card match-li">
                  <div class="card-header d-flex flex-column">
                      <div class="match-mt finished">Terminé</div>
                      <div class="teams d-flex">
                          <div class="team-s">
                              <div class="round-50-tea">
                                  <img src="{{asset('assets/images/logo1.png')}}" class="img-fluid" alt="" />
                              </div>
                          </div>
                          <div class="team-s">
                              <div class="round-50-tea">
                                  <img src="{{asset('assets/images/logo1.png')}}" class="img-fluid" alt="" />
                              </div>
                          </div>
                      </div>
                      <div class="where">Tournoi de maya kopé.</div>
                      <div class="vs-team d-flex flex-column">
                          <div class="winner d-flex justify-content-between">
                              <span>Liverpool</span>
                              <span class="score">3</span>
                          </div>
                          <div class="loser d-flex justify-content-between">
                              <span>Arsenal</span>
                              <span class="score">2</span>
                          </div>
                      </div>
                  </div>
                  <div class="card-body  d-flex flex-column justify-content-center align-items-center w-100">
                      <div class="rounded-team-image">
                          <img src="{{asset('assets/images/team.png')}}" class="img-fluid" alt="" />
                      </div>
                      <div class="rounded-team-image">
                          <img src="{{asset('assets/images/team.png')}}" class="img-fluid" alt="" />
                      </div>
                  </div>
              </div>
          </div>
          </div>
          <div class="titre d-flex justify-content-center align-items-center">
            <h5 class="text-pretty text-center">Les 6 meilleurs buteurs</h5>
          </div>
          <div
            class="row row-cols-3 row-cols-md-6 px-3 py-4 d-flex justify-content-center align-items-center"
          >
            <div
              class="col d-flex justify-content-center flex-column align-items-center"
            >
              <div
                class="rounded text-black py-1 bg-white text-center d-flex justify-content-center align-items-center"
              >
                <span class="px-2 soccer-player"> Kevin</span>
              </div>
  
              <div class="logo-container">
                <div class="logo-player">
                  <img src="{{asset('assets/images/player1.png')}}" class="img-fluid" alt="" />
                </div>
                <i class="mdi mdi-star"></i>
                <div class="number">5</div>
                <div class="active"></div>
              </div>
              <div
                class="rounded text-black py-1 bg-white text-center d-flex justify-content-center align-items-center"
              >
                <span class="px-2 bg-warning team-name-player"> Talent Fc</span>
              </div>
            </div>
            <div
              class="col d-flex justify-content-center flex-column align-items-center"
            >
              <div
                class="rounded text-black py-1 bg-white text-center d-flex justify-content-center align-items-center"
              >
                <span class="px-2 soccer-player"> Kevin</span>
              </div>
  
              <div class="logo-container">
                <div class="logo-player">
                  <img src="{{asset('assets/images/player1.png')}}" class="img-fluid" alt="" />
                </div>
                <i class="mdi mdi-star"></i>
                <div class="number">5</div>
                <div class="active"></div>
              </div>
              <div
                class="rounded text-black py-1 bg-white text-center d-flex justify-content-center align-items-center"
              >
                <span class="px-2 bg-warning team-name-player"> Talent Fc</span>
              </div>
            </div>
            <div
              class="col d-flex justify-content-center flex-column align-items-center"
            >
              <div
                class="rounded text-black py-1 bg-white text-center d-flex justify-content-center align-items-center"
              >
                <span class="px-2 soccer-player"> Kevin</span>
              </div>
  
              <div class="logo-container">
                <div class="logo-player">
                  <img src="{{asset('assets/images/player1.png')}}" class="img-fluid" alt="" />
                </div>
                <i class="mdi mdi-star"></i>
                <div class="number">5</div>
                <div class="active"></div>
              </div>
              <div
                class="rounded text-black py-1 bg-white text-center d-flex justify-content-center align-items-center"
              >
                <span class="px-2 bg-warning team-name-player"> Talent Fc</span>
              </div>
            </div>
            <div
              class="col d-flex justify-content-center flex-column align-items-center"
            >
              <div
                class="rounded text-black py-1 bg-white text-center d-flex justify-content-center align-items-center"
              >
                <span class="px-2 soccer-player"> Kevin</span>
              </div>
  
              <div class="logo-container">
                <div class="logo-player">
                  <img src="{{asset('assets/images/player1.png')}}" class="img-fluid" alt="" />
                </div>
                <i class="mdi mdi-star"></i>
                <div class="number">5</div>
                <div class="active"></div>
              </div>
              <div
                class="rounded text-black py-1 bg-white text-center d-flex justify-content-center align-items-center"
              >
                <span class="px-2 bg-warning team-name-player"> Talent Fc</span>
              </div>
            </div>
            <div
              class="col d-flex justify-content-center flex-column align-items-center"
            >
              <div
                class="rounded text-black py-1 bg-white text-center d-flex justify-content-center align-items-center"
              >
                <span class="px-2 soccer-player"> Kevin</span>
              </div>
  
              <div class="logo-container">
                <div class="logo-player">
                  <img src="{{asset('assets/images/player1.png')}}" class="img-fluid" alt="" />
                </div>
                <i class="mdi mdi-star"></i>
                <div class="number">5</div>
                <div class="active"></div>
              </div>
              <div
                class="rounded text-black py-1 bg-white text-center d-flex justify-content-center align-items-center"
              >
                <span class="px-2 bg-warning team-name-player"> Talent Fc</span>
              </div>
            </div>
            <div
              class="col d-flex justify-content-center flex-column align-items-center"
            >
              <div
                class="rounded text-black py-1 bg-white text-center d-flex justify-content-center align-items-center"
              >
                <span class="px-2 soccer-player"> Kossi Dosseh</span>
              </div>
  
              <div class="logo-container">
                <div class="logo-player">
                  <img src="{{asset('assets/images/player1.png')}}" class="img-fluid" alt="" />
                </div>
                <i class="mdi mdi-star"></i>
                <div class="number">5</div>
                <div class="active"></div>
              </div>
              <div
                class="rounded text-black py-1 bg-white text-center d-flex justify-content-center align-items-center"
              >
                <span class="px-2 bg-warning team-name-player"> Talent Fc</span>
              </div>
            </div>
          </div>
        </div>
        @if(isset($matches))
        <div class="col-md-3 colonne">
          @foreach($matches as $match_i)
          <div class="card mb-1">
            <div class="card-body team-a-vs-b">
              @if(isset($match_i->team1))
              <div class="team-1">
                <div class="team-name">
                  <div class="t-logo">
                    <div class="round-50-ps">
                      @if(isset($match_i->team1->image))
                      <img src="{{asset('assets/images/uploads/'.$match_i->team1->image ?? 'logo1.png')}}" class="img-fluid" alt="" />
                    
                    @else
                    <img src="{{asset('assets/images/logo1.png')}}" class="img-fluid" alt="" />
                    
                    @endif
                  </div>
                  </div>
                  <div class="t-pseudo">{{$match_i->team1->pseudo}}</div>
                </div>
              </div>
              @endif
              <div class="versus-time position-relative">
                <div class="match-live">
                  <span class="timer">
                    @if($match->id===$match_i->id)
                    Live
                    @else
                    {{$match_i->date_match ?? 'Date à venir'}}
                    @endif
                  </span>
                </div>
                <div class="match-score">
                  <span class="fw-bold">
                   {{$match_i->heure_match ?? '15:20'}}

                  </span>
                </div>
                <div>
                  <span>Tournoi de Maya Kopé,Top Foot</span>
                </div>
              </div>
              @if(isset($match_i->team2))
              <div class="team-2">
                <div class="team-name">
                  <div class="t-logo">
                    <div class="round-50-ps">
                      @if(isset($match_i->team2->image))
                      <img src="{{asset('assets/images/uploads/'.$match_i->team2->image ?? 'logo1.png')}}" class="img-fluid" alt="" />
                    
                      @else
                    <img src="{{asset('assets/images/logo1.png')}}" class="img-fluid" alt="" />
                    
                    @endif
                    </div>
                  </div>
                  <div class="t-pseudo">{{$match_i->team2->pseudo}}</div>
                </div>
              </div>
              @endif
            </div>
          </div>
          @endforeach
          
        </div>
        @endif
      </div>
      <div class="row row-cols-1 row-cols-md-3 g-1 w-100 ">
        <div class="col mx-auto height-100">
            <div class="card">
                <div class="card-header d-flex justify-content-center align-items-center">
                    <h6>Poule A</h6>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                  <th></th>
                                    <th class="mdi mdi-star-half-full"></th>
                                    <th>Team</th>
                                    
                                    <th>MJ</th>
                                    <th>V</th>
                                    <th>N</th>
                                    <th>D</th>
                                    <th>BM</th>
                                    <th>BE</th>
                                    <th>DF</th>
                                    <th>Pts</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                  <td>1</td>
                                    <td>
                                        <div class="round-1">
                                            <div class="round-2">
                                                <img class="img-fluid" src="{{asset('assets/images/logo1.png')}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td>Talent</td>
                                    
                                    <td>3</td>
                                    <td>2</td>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>6</td>
                                    <td>2</td>
                                    <td>+4</td>
                                    <td>7</td>
                                </tr>
                                <tr>
                                  <td>2</td>
                                    <td>
                                        <div class="round-1">
                                            <div class="round-2">
                                                <img class="img-fluid" src="{{asset('assets/images/logo1.png')}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td>Talent</td>
                                    
                                    <td>3</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>5</td>
                                    <td>3</td>
                                    <td>+2</td>
                                    <td>4</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col mx-auto height-100">
            <div class="card">
                <div class="card-header d-flex justify-content-center align-items-center">
                    <h6>Poule B</h6>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th></th>
                                  <th class="mdi mdi-star-half-full"></th>
                                  <th>Team</th>
                                  
                                  <th>MJ</th>
                                  <th>V</th>
                                  <th>N</th>
                                  <th>D</th>
                                  <th>BM</th>
                                  <th>BE</th>
                                  <th>DF</th>
                                  <th>Pts</th>

                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                  <td>
                                      <div class="round-1">
                                          <div class="round-2">
                                              <img class="img-fluid" src="{{asset('assets/images/logo1.png')}}">
                                          </div>
                                      </div>
                                  </td>
                                  <td>Talent</td>
                                  
                                  <td>3</td>
                                  <td>2</td>
                                  <td>1</td>
                                  <td>0</td>
                                  <td>6</td>
                                  <td>2</td>
                                  <td>+4</td>
                                  <td>7</td>
                              </tr>
                              <tr>
                                <td>2</td>
                                  <td>
                                      <div class="round-1">
                                          <div class="round-2">
                                              <img class="img-fluid" src="{{asset('assets/images/logo1.png')}}">
                                          </div>
                                      </div>
                                  </td>
                                  <td>Talent</td>
                                  
                                  <td>3</td>
                                  <td>1</td>
                                  <td>1</td>
                                  <td>1</td>
                                  <td>5</td>
                                  <td>3</td>
                                  <td>+2</td>
                                  <td>4</td>
                              </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col mx-auto height-100">
            <div class="card">
                <div class="card-header d-flex justify-content-center align-items-center">
                    <h6>Poule C</h6>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th></th>
                                  <th class="mdi mdi-star-half-full"></th>
                                  <th>Team</th>
                                  
                                  <th>MJ</th>
                                  <th>V</th>
                                  <th>N</th>
                                  <th>D</th>
                                  <th>BM</th>
                                  <th>BE</th>
                                  <th>DF</th>
                                  <th>Pts</th>

                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                  <td>
                                      <div class="round-1">
                                          <div class="round-2">
                                              <img class="img-fluid" src="{{asset('assets/images/logo1.png')}}">
                                          </div>
                                      </div>
                                  </td>
                                  <td>Talent</td>
                                  
                                  <td>3</td>
                                  <td>2</td>
                                  <td>1</td>
                                  <td>0</td>
                                  <td>6</td>
                                  <td>2</td>
                                  <td>+4</td>
                                  <td>7</td>
                              </tr>
                              <tr>
                                <td>2</td>
                                  <td>
                                      <div class="round-1">
                                          <div class="round-2">
                                              <img class="img-fluid" src="{{asset('assets/images/logo1.png')}}">
                                          </div>
                                      </div>
                                  </td>
                                  <td>Talent</td>
                                  
                                  <td>3</td>
                                  <td>1</td>
                                  <td>1</td>
                                  <td>1</td>
                                  <td>5</td>
                                  <td>3</td>
                                  <td>+2</td>
                                  <td>4</td>
                              </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    </div>
  </div>
  <link rel="stylesheet" href="{{asset('assets/css/dashboard.css')}}">
  <script src="{{asset('assets/js/dashboard.js')}}"></script>
  @endsection