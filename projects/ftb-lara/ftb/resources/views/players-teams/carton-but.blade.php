

<link rel="stylesheet" href="{{asset('assets/css/form.css')}}">
<div class="modal fade" id="carton-but" tabindex="-1" aria-labelledby="cartonupdateplayerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartonupdateplayerModalLabel">Mise à du joueur
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bc-form" method="post" action="{{ route('but_carton') }}"  enctype="multipart/form-data">
                    @method('POST')
                     @csrf
                    
                     @if(isset($teams) && $teams !== null)
                     <div class="mb-2">
                         <select id="team-select-three" class="my-select" name="team">
                             <option disabled selected value="">Sélectionnez l'équipe</option>
                             @foreach($teams as $option)
                                 <option value="{{$option['id']}}" data-name="{{$option['nom']}}" data-players="{{ json_encode($option['players']) }}">
                                     {{$option['nom']}}
                                 </option>
                             @endforeach
                         </select>
                         
                         <select id="player-select-index" class="my-select mt-2" name="player">
                             <option disabled selected value="">Sélectionnez le joueur</option>
                         </select>
                 
                         <select id="info-select" class="my-select mt-2" name="information">
                             <option disabled selected value="">Information</option>
                             <option value="cartons">Cartons</option>
                             <option value="buts">Buts</option>
                             <option value="matchs">Matchs joués</option>
                         </select>
                     </div>
                 
                     <div id="input-fields" class="mb-2"></div>
                 @endif
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn but-primary " id="bc-submit">
                            <span id="bc-loader" class="spinner-border spin-l text-success spinner-border-sm d-none"></span>
                            Mise à jour
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/js/form.js')}}"></script>
<script>
    document.getElementById('bc-form').addEventListener('submit', function(e) {
e.preventDefault();


const loader = document.getElementById('bc-loader');
loader.classList.remove('d-none');


const submitButton = document.getElementById('bc-submit');
submitButton.disabled = true;


setTimeout(() => {
this.submit(); 
}, 800);
});

    

    const teamSelect3 = document.getElementById('team-select-three');
    const playerSelect3 = document.getElementById('player-select-index');
    const infoSelect = document.getElementById('info-select');
    const inputFieldsDiv = document.getElementById('input-fields');

    teamSelect3.addEventListener('change', function() {
        // Réinitialiser le menu déroulant des joueurs
        playerSelect3.innerHTML = '<option disabled selected value="">Sélectionnez le joueur</option>';

        const selectedOption = teamSelect3.options[teamSelect3.selectedIndex];
        const players = JSON.parse(selectedOption.getAttribute('data-players'));

        // Ajouter les options de joueurs au menu déroulant
        players.forEach(player => {
            const option = document.createElement('option');
            option.value = player.id;
            option.textContent = player.nom;
            playerSelect3.appendChild(option);
        });
    });

    infoSelect.addEventListener('change', function() {
        const selectedInfo = infoSelect.value;

        // Réinitialiser les champs d'entrée
        inputFieldsDiv.innerHTML = '';

        let inputHtml = '';

        if (selectedInfo === 'cartons') {
            inputHtml = `
                <div class="mb-2">
                    <input type="number" id="yellow-card" class="w-100 px-2 rounded input-team" name="yellow_card" placeholder="Cartons jaunes" min="0">
                </div>
                <div class="mb-2">
                    <input type="number" id="red-card" class="w-100 px-2 rounded input-team" name="red_card" placeholder="Cartons rouges" min="0">
                </div>
            `;
        } else if (selectedInfo === 'buts') {
            inputHtml = `
                <div class="mb-2">
                    <input type="number" id="goals" class="w-100 px-2 rounded input-team" name="goals" placeholder="Buts" min="0">
                </div>
            `;
        } else if (selectedInfo === 'matchs') {
            inputHtml = `
                <div class="mb-2">
                    <input type="number" id="matches-played" class="w-100 px-2 rounded input-team" name="matches_played" placeholder="Matchs joués" min="0">
                </div>
            `;
        }

        inputFieldsDiv.innerHTML = inputHtml;
    });


</script>