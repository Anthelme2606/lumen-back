<div class="modal fade" id="match_aujModal" tabindex="-1" aria-labelledby="recordsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="recordsModalLabel">Match aujourd' hui</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
<style>
    .team-logo {
      width: 35px;
      height: 35px;
      border-radius: 50%;
      overflow: hidden;
      margin-bottom: 0.5rem;
      background-color: white;
      box-shadow: 0 0.1rem 0.2rem rgba(0, 0, 0, 0.1);
    }
    .team-name {
      font-size: 0.75rem;
      font-weight: bold;
    }
    .text-date {
      font-size: 10px;
    }
    .readonly-card {
      pointer-events: none;
      opacity: 0.6;
    }
    .b-hidden{
        display:none;
        opacity:0;
    }
  </style>




       <div class="d-flex justify-content-center align-items-center mb-2">
        @php
        $ids = [];  // Initialisation du tableau pour stocker les IDs
    @endphp
    
    <select id="record-select" class="my-select" name="team">
        <option disabled selected value="">Sélectionnez l'équipe</option>
        
        @foreach($teams as $option)
            @if(isset($option->team1Versus) && $option->team1Versus->isNotEmpty())
                @foreach($option->team1Versus as $team1)
                    @if(!in_array($team1->team1->id, $ids))  
                        @php
                            $ids[] = $team1->team1->id;  // Ajout de l'ID dans le tableau pour éviter les doublons
                        @endphp
                        <option value="{{ $team1->team1->id }}">{{ $team1->team1->nom }}</option>
                    @endif
                @endforeach
            @endif
            
            @if(isset($option->team2Versus) && $option->team2Versus->isNotEmpty())
                @foreach($option->team2Versus as $team2)
                    @if(!in_array($team2->team2->id, $ids))
                        @php
                            $ids[] = $team2->team2->id;  // Ajout de l'ID dans le tableau pour éviter les doublons
                        @endphp
                        <option value="{{ $team2->team2->id }}">{{ $team2->team2->nom }}</option>
                    @endif
                @endforeach
            @endif
        @endforeach
    </select>
    
        
       </div>
        <div class="row row-cols-1 row-cols-md-2 g-4" id="matches-container">


        </div>
        <form id="records-form" class="d-flex flex-column mt-2" method="post" action='{{route('record')}}'>
        @method('post')
        @csrf
            <input hidden class="" type="text" id="team-input" name="match_id" readonly >
        <div  class="d-flex justify-content-center b-hidden" id="b-hide">
            <button type="submit" class="btn but-primary " id="records-team-submit">
                <span id="records-team-loader" class="spinner-border spin-l text-success spinner-border-sm d-none"></span>
           Match
            </button>
       </form>
      

    
    


            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/js/form.js')}}"></script>
<script>
   document.getElementById('record-select').addEventListener('change', function () {
    var selectedTeamId = this.value;
    displayMatches(selectedTeamId);
});

function displayMatches(teamId) {
   
  

    let content = '';

    @foreach($teams as $team)
        @if($team->id)
            // Vérifie si l'équipe correspond à l'équipe sélectionnée
            if (teamId == {{ $team->id }}) {

                const opponents=@json($team_service->opponents($teams,$team));
                Object.entries(opponents).forEach((opponent,index)=>{
                    content += `
                    <div class="col">
                        <divid="{{$team->id}}" class="card position-relative card-checker" data-team-id="${opponent.match_id}">
                            <div class="card-body text-center d-flex justify-content-center align-items-center">
                                <div class="position-absolute top-0 start-0 m-2">
                                    <input type="checkbox" name="matchSelect" class="form-check-input match-check">
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="team-logo mx-auto">
                                   <img src="{{$team->image ? $team->image : 'https://via.placeholder.com/100x50'}}" alt="Logo" class="w-100 h-100">
                                    </div>
                                    <div class="team-name">{{$team->nom}}</div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="vs mt-2 mb-1">VS</div>
                                    <div class="date-time">
                                        <div class="text-date">${opponent.date_match}</div>
                                        <div>${opponent.heure_match}</div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="team-logo mx-auto">
                                        <img src="${opponent.image ? $opponent.image:'https://via.placeholder.com/100x50'}" alt=" Logo" class="w-100 h-100">
                                    </div>
                                    <div class="team-name">${opponent.nom}</div>
                                </div>
                            </div>
                        </div>
                    </div>`;

                })
                   
                  }
            
        @endif
    @endforeach

    // Insérer le contenu généré dans l'élément avec l'ID 'matches-container'
    document.getElementById('matches-container').innerHTML = content;
    const cards = document.querySelectorAll('.card-checker');
    const checks = document.querySelectorAll('.match-check');
    const team = document.querySelector('#team-input');
    const btn = document.querySelector('#b-hide');
    data=0;
    console.log(cards);
    cards.forEach((card, index) => {
      card.addEventListener('click', () => {
        // Toggle the checked state of the clicked card
        const isChecked = !checks[index].checked;
        checks[index].checked = isChecked;
        
        team.value = card.dataset.teamId;
        btn.classList.toggle('b-hidden');
    
        // If the card is unchecked, remove readonly-card from all cards
        if (!isChecked) {
          cards.forEach(card => card.classList.remove('readonly-card'));
          team.value='';
        } else {
          // Otherwise, update all cards based on their checked state
          cards.forEach((card, i) => {
            if (!checks[i].checked) {
              card.classList.add('readonly-card');
              
            } else {
                
                 card.classList.remove('readonly-card');
            }
          });
        }
      });
    });
}

    document.getElementById('records-form').addEventListener('submit', function(e) {
e.preventDefault();


const loader = document.getElementById('records-team-loader');
loader.classList.remove('d-none');


const submitButton = document.getElementById('records-team-submit');
submitButton.disabled = true;


setTimeout(() => {
this.submit(); 
}, 800);
});

    



</script>
<script>
    
    
   
    </script>
    