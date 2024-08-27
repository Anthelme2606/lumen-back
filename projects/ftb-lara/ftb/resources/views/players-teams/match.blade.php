<div class="modal fade" id="ajoutMatchModal" tabindex="-1" aria-labelledby="ajoutMatchModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajoutMatchModalLabel">Nouveau match</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
    <div class="card card-custom">
        <div class="card-header text-center">
            <h2 class="card-title">Créer un nouveau match</h2>
        </div>
        <div class="card-body">
            <form   id="matchForm" method="post" action="{{ route('m_creation') }}"  enctype="multipart/form-data">
                 @method('POST')
                 @csrf
                <div class="mb-3">
                    <label for="team1" class="form-label">Équipe 1</label>
                    <select id="team1" class="form-select" name="team1_id" required>
                        <option value="">Choisissez l'équipe 1</option>
                        @if(isset($teams))
                        @foreach($teams as $team)
                        <option value="{{$team['id']}}">{{$team['nom']}}</option>
                        @endforeach
                        @endif
                      
                    </select>
                </div>
                <div class="mb-3">
                    <label for="team2" class="form-label">Équipe 2</label>
                    <select id="team2" class="form-select" name="team2_id" required>
                        <option value="">Choisissez l'équipe 2</option>
                        @if(isset($teams))
                        @foreach($teams as $team)
                        <option  value="{{$team['id']}}">{{$team['nom']}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="mb-3">
                    <label for="gameTime" class="form-label">Temps de jeu (minutes)</label>
                    <input type="number" id="gameTime" name="timer" class="form-control" placeholder="90" required>
                </div>
                <div class="mb-3">
                    <label for="matchDate" class="form-label">Date du match</label>
                    <input type="date" id="matchDate" name="date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="timeInput" class="form-label">heure du match</label>
                    <input type="text" name="heure_match" id="timeInput" class="form-control time-input" placeholder="HH:MM" maxlength="5">
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn but-primary " id="match-submit">
                        <span id="match-loader" class="spinner-border spin-l text-success spinner-border-sm d-none"></span>
                       Match
                    </button>
                </div> </form>
        </div>
        <div class="card-footer">
            <h3 class="card-title">Aperçu du match</h3>
            <div class="card bg-secondary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div id="preview-teams">
                            <span>Équipe 1 vs Équipe 2</span>
                        </div>
                        <div id="preview-time">
                            <span>90 min</span>
                        </div>
                    </div>
                    <div id="preview-date">
                        <span>Date à définir</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/js/form.js')}}"></script>
<script>

    document.getElementById('matchForm').addEventListener('submit', function(e) {
e.preventDefault();


const loader = document.getElementById('match-loader');
loader.classList.remove('d-none');


const submitButton = document.getElementById('match-submit');
submitButton.disabled = true;


setTimeout(() => {
this.submit(); 
}, 800);
});
const timeInput = document.getElementById('timeInput');
timeInput.addEventListener('keydown', function(e) {
        // Autoriser uniquement les touches numériques, backspace, tab, et les touches directionnelles
        const allowedKeys = ['Backspace', 'Tab', 'ArrowLeft', 'ArrowRight', 'ArrowUp', 'ArrowDown'];
        if (!e.key.match(/^[0-9]$/) && !allowedKeys.includes(e.key)) {
            e.preventDefault();
        }
    });
            timeInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/[^\d]/g, '');
                
                if (value.length > 4) {
                    value = value.slice(0, 4);
                }

                if (value.length > 2) {
                    value = value.slice(0, 2) + ':' + value.slice(2);
                }

                e.target.value = value;

                // Déplacer le curseur après les deux points si on vient de les ajouter
                if (value.length === 3) {
                    setTimeout(() => {
                        e.target.setSelectionRange(3, 3);
                    }, 0);
                }
            });

    document.getElementById('matchForm').addEventListener('submit', function (e) {
        e.preventDefault();

        const team1 = document.getElementById('team1').value || "Équipe 1";
        const team2 = document.getElementById('team2').value || "Équipe 2";
        const gameTime = document.getElementById('gameTime').value || "90";
        const matchDate = document.getElementById('matchDate').value || "Date à définir";

        document.getElementById('preview-teams').innerHTML = `<span>${team1} vs ${team2}</span>`;
        document.getElementById('preview-time').innerHTML = `<span>${gameTime} min</span>`;
        document.getElementById('preview-date').innerHTML = `<span>${matchDate}</span>`;
    });
</script>
 <script>
    const team1Select = document.getElementById('team1');
    const team2Select = document.getElementById('team2');
    const originalTeam2Options = [...team2Select.options];

    team1Select.addEventListener('change', function () {
        updateTeamOptions(team1Select, team2Select);
    });

    team2Select.addEventListener('change', function () {
        updateTeamOptions(team2Select, team1Select);
    });

    function updateTeamOptions(changedSelect, otherSelect) {
        const selectedValue = changedSelect.value;
        const otherOptions = [...originalTeam2Options]; // Clone original options

        // Clear the other select options
        otherSelect.innerHTML = '';

        otherOptions.forEach(option => {
            if (option.value !== selectedValue) {
                otherSelect.appendChild(option);
            }
        });

        // Re-add a placeholder option
        otherSelect.insertAdjacentHTML('afterbegin', '<option value="">Choisissez l\'équipe</option>');

        // Retain the previous selection if still valid
        const previousSelection = otherSelect.dataset.selectedValue;
        if (previousSelection && otherSelect.querySelector(`option[value="${previousSelection}"]`)) {
            otherSelect.value = previousSelection;
        } else {
            otherSelect.value = "";
        }

        // Store the new selection
        changedSelect.dataset.selectedValue = selectedValue;
    }
</script>
