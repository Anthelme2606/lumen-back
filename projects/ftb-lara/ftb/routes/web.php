<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Teams\TeamController;
use App\Http\Controllers\Teams\TeamPlayerController;
use App\Http\Controllers\Authentication\AuthController;
use App\Http\Controllers\PlayersController;
use App\Http\Controllers\Teams\ScoreController;
Route::get('/',[HomeController::class,'index'])->name('dashboard');
Route::get('/teams',[TeamController::class,'index'])->name('teams');
Route::post('/post-teams',[TeamController::class,'store'])->name('store-team');
Route::post('/post-player',[PlayersController::class,'store'])->name('store-player');
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::get('/teams-players',[TeamPlayerController::class,'creation'])->name('team-player');
Route::get('/trophies',[PlayersController::class,'trophies'])->name('trophies');
Route::get('/scores',[ScoreController::class,'index'])->name('scores');
Route::post('/upload-file',[HomeController::class,'upload'])->name('upload.file');
Route::post('/teams-update',[TeamPlayerController::class,'t_update'])->name('t_update');
Route::post('/players-update',[TeamPlayerController::class,'p_update'])->name('p_update');
Route::post('/but-carton',[TeamPlayerController::class,'but_carton'])->name('but_carton');
Route::post('/match-creation',[TeamPlayerController::class,'m_creation'])->name('m_creation');
Route::post('/fiche-match',[TeamPlayerController::class,'f_match'])->name('f_macth');
Route::post('/poule',[TeamPlayerController::class,'c_poule'])->name('c_polue');
Route::post('/add-tem-polue',[TeamPlayerController::class,'add_t_p'])->name('add_t_p');
Route::post('/post-recors',[TeamPlayerController::class,'record'])->name('record');