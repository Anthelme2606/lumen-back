<style>
    .players-container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .my-card {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        max-width: 300px;
        margin: 0 auto;
        padding: 16px;
    }

    /* Styles pour l'en-tête */
    .header-fiche {
        display: flex;
        gap: 8px;
        margin-bottom: 16px;
    }

    select, button, input {
        padding: 4px;
        font-size: 14px;
    }

    #toggle-cards {
        border: none;
        outline: none;
        background-color: blue;
        color: #fff;
        padding: 8px;
        border-radius: 6px;
    }

    /* Styles pour les lignes de joueurs */
    .player-row {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 8px;
        font-size: 14px;
    }

    .player-name {
        width: 50px;
        font-size:8px !important;
        font-weight:bold;
    }

    .player-number {
        width: 40px;
    }

    .player-checkbox {
        width: 16px;
        height: 16px;
    }

    .player-card, .player-goals {
        width: 48px;
    }
</style>
<div class="modal fade" id="ficheModal" tabindex="-1" aria-labelledby="ficheModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ficheModalLabel">Fiche de fiche</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="ficheForm" method="post" action="{{ route('f_macth') }}" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="card my-card">
                        <div class="header-fiche">
                            <select id="team-select" name="team">
                                <option value="">Équipe</option>
                                @foreach($records as $team)
                                <option value="{{$team->id}}">{{ $team->nom }}</option>
                                @endforeach
                            </select>
                          
                            <button type="button" id="toggle-cards">Carton</button>
                        </div>
                        <div id="players-container"></div>
                    </div>
                
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn but-primary" id="fiche-submit">
                            <span id="fiche-loader" class="spinner-border spin-l text-success spinner-border-sm d-none"></span>
                            Fiche
                        </button>
                    </div>
                </form>
                
              
                
    

            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/js/form.js')}}"></script>
<script>
    document.getElementById('ficheForm').addEventListener('submit', function(e) {
e.preventDefault();


const loader = document.getElementById('fiche-loader');
loader.classList.remove('d-none');


const submitButton = document.getElementById('fiche-submit');
submitButton.disabled = true;


setTimeout(() => {
this.submit(); 
}, 800);
});

   /* document.getElementById('ficheForm').addEventListener('submit', function (e) {
        e.preventDefault();

        const team1 = document.getElementById('team1').value || "Équipe 1";
        const team2 = document.getElementById('team2').value || "Équipe 2";
        const gameTime = document.getElementById('gameTime').value || "90";
        const ficheDate = document.getElementById('ficheDate').value || "Date à définir";

        document.getElementById('preview-teams').innerHTML = `<span>${team1} vs ${team2}</span>`;
        document.getElementById('preview-time').innerHTML = `<span>${gameTime} min</span>`;
        document.getElementById('preview-date').innerHTML = `<span>${ficheDate}</span>`;
    });*/
</script>
<script>
                   
                   const teamPlayers = {
    @foreach($records as $team)
    {{ $team->id }}: [
        @foreach($team->players as $player)
        {
            id: {{ $player->id }},
            name: "{{ $player->nom }}",
            match_id: {{ $team->match_id }},
            number: {{ $player->dorsa }},
        },
        @endforeach
    ],
    @endforeach
};

let showCards = false;

function createPlayerRow(player) {
    return `
        <div class="player-row">
            <div class="player-name text-capitalize">${player.name.slice(0, 50)}</div>
            <input type="number" value="${player.number}" class="player-number" readonly>
            <input type="hidden" name="players[${player.id}][player_id]" value="${player.id}">
            <input type="hidden" name="players[${player.id}][match_id]" value="${player.match_id}">
            <input type="checkbox" name="players[${player.id}][play]" value="1" class="player-checkbox" id="play_${player.id}" aria-label="Joue aujourd'hui">
            ${showCards ? `
                <select class="player-card" name="players[${player.id}][carton]">
                    <option value="">Carton</option>
                    <option value="J">J</option>
                    <option value="R">R</option>
                </select>
            ` : ''}
            <input type="number" name="players[${player.id}][goal]" min="0" class="player-goals" placeholder="Buts" aria-label="Buts marqués">
        </div>
    `;
}

function updatePlayersDisplay(teamId) {
    const container = document.getElementById('players-container');
    container.innerHTML = '';
    
    if (teamId && teamPlayers[teamId]) {
        const playersHtml = teamPlayers[teamId].map(createPlayerRow).join('');
        container.innerHTML = playersHtml;
    }
}

document.getElementById('team-select').addEventListener('change', function() {
    const selectedTeam = this.value;
    updatePlayersDisplay(selectedTeam);
});

document.getElementById('toggle-cards').addEventListener('click', function() {
    showCards = !showCards;
    this.classList.toggle('active', showCards);
    const selectedTeam = document.getElementById('team-select').value;
    updatePlayersDisplay(selectedTeam);
});

</script>

