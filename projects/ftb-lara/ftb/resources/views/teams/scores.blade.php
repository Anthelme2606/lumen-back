@extends('layouts.index')
@section('title','Trophés')
@section('sidebar')
<x-sidebar/>
@endsection
@section('container')
<div class="dashboard">
<div class="content mt-1">
    @php
   $trophies = [
    [
        'mdi' => 'mdi-trophy',
        'trophy' => 'Champion du Tournoi',
        'star' => 'mdi-star'
    ],
    [
        'mdi' => 'mdi-trophy-variant',
        'trophy' => 'Finaliste',
        'star' => 'mdi-star'
    ],
    [
        'mdi' => 'mdi-soccer',
        'trophy' => 'Meilleur Buteur',
        'star' => 'mdi-star'
    ],
    [
        'mdi' => 'mdi-trophy-outline',
        'trophy' => 'Meilleur Gardien de But',
        'star' => 'mdi-star'
    ],
    [
        'mdi' => 'mdi-star',
        'trophy' => 'Meilleur Joueur',
        // 'star' => 'mdi-star'
    ],
    [
        'mdi' => 'mdi-shield',
        'trophy' => 'Meilleur Défenseur',
        'star' => 'mdi-star'
    ],
    [
        'mdi' => 'mdi-trophy-outline',
        'trophy' => 'Meilleur Passer',
        'star' => 'mdi-star'
    ],
    [
        'mdi' => 'mdi-trophy-outline',
        'trophy' => 'Meilleur Entraîneur',
        'star' => 'mdi-star'
    ],
    [
        'mdi' => 'mdi-handshake',
        'trophy' => 'Équipe Fair-Play',
        'star' => 'mdi-star'
    ],
    [
        'mdi' => 'mdi-star-circle',
        'trophy' => 'Meilleur Jeune Talent',
        'star' => 'mdi-star'
    ],
    [
        'mdi' => 'mdi-football',
        'trophy' => 'Meilleur Joueur de Terrain',
        'star' => 'mdi-star'
    ],
    [
        'mdi' => 'mdi-trophy-award',
        'trophy' => 'Meilleur Joueur de la Saison',
        'star' => 'mdi-star'
    ]
];

    @endphp
    <div class="row row-cols-1 row-cols-md-4 w-100 g-1">
        @foreach($trophies as $trophy)
        <div class="col mx-auto d-flex flex-column flex-grouw-1 height-100">
            <div class="card flex-grow-1 flex-column position-relative">
                <div class="versus d-flex align-items-center justify-content-between">
                   
                    <div class="round-1">
                        <div class="round-2">
                            <img class="img-fluid" src="{{asset('assets/images/logo1.png')}}">
                        </div>  
                    </div>
                    <div class="date&time d-flex flex-column justify-content-center align-items-center">
                        <h6>16/08/2024</h6>
                        <span>VS</span>
                        <span class="score">1:2</span>
                      </div> 
                      <div class="round-1">
                        <div class="round-2">
                            <img class="img-fluid" src="{{asset('assets/images/logo1.png')}}">
                        </div>  
                    </div>
                </div>
                <div class="buteurs d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-column">
                        <div class="player&score d-flex">
                            <span class="mx-2 text-center"> Abalo</span>
                              <span class="mx-2 text-center">22'</span>
                             
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                    <div class="player&score d-flex">
                        <span class="mx-2 text-center"> kossi</span>
                        <span class="mx-2 text-center">41'</span>
                         
                    </div>
                    <div class="player&score d-flex">
                        <span class="mx-2 text-center"> kossi</span>
                        <span class="mx-2 text-center">74'</span>
                         
                    </div>
                </div>
                </div>   
               
            </div>
        </div>
        @endforeach
        </div> 
    </div>
</div>
@endsection