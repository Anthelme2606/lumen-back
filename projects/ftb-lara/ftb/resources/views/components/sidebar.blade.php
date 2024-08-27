
<link rel="stylesheet" href="{{asset('assets/css/sidebar.css')}}">
<div class="sidebar" id="sidebar">
    <aside>
        <div class="logo logo-sidebar">
            <img src="{{asset('assets/images/logo1.png')}}" class="img-fluid" alt="">
        </div>
        
        <ul class=" bg-white">
            <li>
                <a href="{{route('dashboard')}}">
                    <div class="d-flex align-items-center">
                        <div class="round-50">
                            <span class="mdi mdi-soccer turn-live"></span>
                        </div>
                        <span class="sidebar-title">Dashboard</span>
                    </div>
                </a>
            </li>
            {{-- <li>
                <a href="#">
                    <div class="d-flex align-items-center">
                        <div class="round-50">
                            <span class="mdi mdi-timer-sand"></span>
                        </div>
                        <span class="sidebar-title">Timer</span>
                    </div>
                </a>
            </li> --}}
            <li>
                <a href="{{route('teams')}}">
                    <div class="d-flex align-items-center">
                        <div class="round-50">
                            <span class="mdi mdi-account-group"></span>
                        </div>
                        <span class="sidebar-title">Equipes</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{route('team-player')}}">
                    <div class="d-flex align-items-center">
                        <div class="round-50">
                            <span class="mdi mdi-account-multiple"></span>
                        </div>
                        <span class="sidebar-title">Gestions</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{route('scores')}}">
                    <div class="d-flex align-items-center">
                        <div class="round-50">
                            <span class="mdi mdi-numeric"></span>
                        </div>
                        <span class="sidebar-title">Scores</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{route('trophies')}}">
                    <div class="d-flex align-items-center">
                        <div class="round-50">
                            <span class="mdi mdi-trophy"></span>
                        </div>
                        <span class="sidebar-title">Trophés</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{route('login')}}">
                    <div class="d-flex align-items-center">
                        <div class="round-50">
                            <span class="mdi mdi-login"></span>
                        </div>
                        <span class="sidebar-title">Login</span>
                    </div>
                </a>
            </li>
        </ul>
    </aside>
</div>



