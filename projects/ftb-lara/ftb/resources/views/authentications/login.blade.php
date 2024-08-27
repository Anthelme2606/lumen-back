@extends('layouts.index')
@section('title','Teams')
@section('sidebar')
<x-sidebar/>
@endsection
@section('container')
<div class="dashboard">
<div class="content mt-1">
    <div class="login-container position-relative ">
          {{-- <div class="login-soccer  ">
            </div> --}}
        <div class="login-header psotion-absolute">
          
            <div class="text-header d-flex flex-column">
                <h1>Admin</h1>
                <p>Entrez vos parametres de connexions</p>
            </div>
            
        </div>
        <form>
            <div class="form-group">
                <label for="identity">Identitifiant</label>
                <input type="text" id="identity" name="identity" placeholder="Enter your identity" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="login-button">Se connecter</button>
        </form>
        <div class="footer">
            <p>Retourne vers le<a href="{{route('dashboard')}}">Dashboard</a></p>
        </div>
    </div>
</div>
</div>
<link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
@endsection
