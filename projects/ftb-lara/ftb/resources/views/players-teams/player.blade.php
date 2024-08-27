<link rel="stylesheet" href="{{asset('assets/css/form.css')}}">
<div class="modal fade" id="equipeModal" tabindex="-1" aria-labelledby="equipeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="equipeModalLabel">Ajout du joueur dans une équipe
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form   id="player-form" method="post" action="{{ route('store-player') }}"  enctype="multipart/form-data">
                    @method('POST')
                     @csrf
                     <div class="mb-2">
                        <select class="my-select" name="team">
                            <option disabled selected value="Selectionne la team ">Selectionne la team</option>
                           @if(isset($teams))
                        
                           @foreach($teams as $option)
                            <option value="{{$option['id']}}">{{$option['nom']}}</option>
                          @endforeach
                            @endif
                        </select>

                    
                </div>
                     <div class="mb-2">
                        <label for="nom" class="form-label">Nom du joueur</label>
                        <input type="text" name="nom" id="nom" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="dorsa" class="form-label">Dorsa</label>
                        <input type="number" min="1" name="dorsa" id="dorsa" class="form-control" required>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn but-primary " id="player-submit">
                            <span id="player-loader" class="spinner-border spin-l text-success spinner-border-sm d-none"></span>
                            Ajout du joueur
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/js/form.js')}}"></script>
<script>
    document.getElementById('player-form').addEventListener('submit', function(e) {
e.preventDefault();


const loader = document.getElementById('player-loader');
loader.classList.remove('d-none');


const submitButton = document.getElementById('player-submit');
submitButton.disabled = true;


setTimeout(() => {
this.submit(); 
}, 800);
});
</script>