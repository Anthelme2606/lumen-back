<style>
    .card-header {
      border-bottom: none;
    }
    .checkbox-wrapper {
      display: flex;
      align-items: center;
      gap: 15px;
    }
    .custom-checkbox .form-check-input:checked {
      background-color: #007bff;
      border-color: #007bff;
    }
    .custom-checkbox .form-check-input:focus {
      box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
    }
    .custom-checkbox .form-check-input {
      width: 20px;
      height: 20px;
    }
  </style> 

<link rel="stylesheet" href="{{asset('assets/css/form.css')}}">
<div class="modal fade" id="poule-team-Modal" tabindex="-1" aria-labelledby="cartonupdateplayerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartonupdateplayerModalLabel">Creaton de la poule team
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="poule-team-form" method="post" action="{{ route('add_t_p') }}"  enctype="multipart/form-data">
                    @method('POST')
                     @csrf
                     <div class="card">
                        <div class="card-header">
                          <h5 class="card-title">Ajouter des équipes à une poule</h5>
                        </div>
                        @if(isset($poules))
                        <div class="card-body">
                          <div class="row g-4">
                            <div class="col-md-6">
                              <h6 class="text-lg font-semibold mb-2">Sélectionner une poule</h6>
                              @foreach($poules as $poule)
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="poule" id="{{$poule['id']}}" value="{{$poule['id']}}" onclick="handlePouleSelect('{{$poule['id']}}')">
                                <label class="form-check-label" for="{{$poule['id']}}">{{$poule['name']}}</label>
                              </div>
                              @endforeach
                             
                            </div>
                            <div class="col-md-6">
                              <h6 class="text-lg font-semibold mb-2">Sélectionner les équipes</h6>
                              @foreach($poules as $poule)
                              @foreach($teams as $team)
                                  @php
                                    
                                      $isAttached = $poule->teams->contains($team->id);
                                  @endphp
                          
                                  @if(!$isAttached)  
                                      <div class="form-check checkbox-wrapper">
                                          <input class="form-check-input" type="checkbox" name="{{$team['id']}}-team" id="{{$team['id']}}" value="{{$team['id']}}">
                                          <label class="form-check-label" for="{{$team['id']}}">{{$team['nom']}}</label>
                                      </div>
                                  @endif
                              @endforeach
                          @endforeach
                            </div>
                          </div>
                          <div class="d-flex justify-content-center">
                            <button type="submit" class="btn but-primary " id="poule-team-submit">
                                <span id="poule-team-loader" class="spinner-border spin-l text-success spinner-border-sm d-none"></span>
                            Poule Team
                            </button>
                        </div>
                        @endif
                    </div>
                      </div>
                   
                
                   
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    let selectedPoule = null;
    const handlePouleSelect = (poule) => {
      selectedPoule = poule;
      document.querySelectorAll('.form-check-input[type="checkbox"]').forEach(checkbox => {
    
        checkbox.disabled = !selectedPoule;
      });
      document.getElementById('poule-team-submit').disabled = !selectedPoule || !Array.from(document.querySelectorAll('.form-check-input[type="checkbox"]')).some(checkbox => checkbox.checked);
    };

    const handleEquipeToggle = (equipe) => {
      const allCheckboxes = Array.from(document.querySelectorAll('.form-check-input[type="checkbox"]'));
      const isAnyEquipeChecked = allCheckboxes.some(checkbox => checkbox.checked);
      document.getElementById('poule-team-submit').disabled = !selectedPoule || !isAnyEquipeChecked;
    };

    document.querySelectorAll('.form-check-input[type="checkbox"]').forEach(checkbox => {
      checkbox.addEventListener('change', () => {
        handleEquipeToggle(checkbox.value);
      });
    });
  </script>
<script src="{{asset('assets/js/form.js')}}"></script>
<script>
    document.getElementById('poule-team-form').addEventListener('submit', function(e) {
e.preventDefault();


const loader = document.getElementById('poule-team-loader');
loader.classList.remove('d-none');


const submitButton = document.getElementById('poule-team-submit');
submitButton.disabled = true;


setTimeout(() => {
this.submit(); 
}, 800);
});

    



</script>