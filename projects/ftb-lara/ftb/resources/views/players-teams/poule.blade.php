

<link rel="stylesheet" href="{{asset('assets/css/form.css')}}">
<div class="modal fade" id="pouleModal" tabindex="-1" aria-labelledby="cartonupdateplayerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartonupdateplayerModalLabel">Creaton de la poule
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="poule-form" method="post" action="{{ route('c_polue') }}"  enctype="multipart/form-data">
                    @method('POST')
                     @csrf
                    <div class="mb-2">
                        <input type="text" id="" class="w-100 px-2 rounded input-team" name="name" value="" placeholder="Nom de la poule" required >
                    </div>
                   
                
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn but-primary " id="poule-submit">
                            <span id="poule-loader" class="spinner-border spin-l text-success spinner-border-sm d-none"></span>
                           Poule
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/js/form.js')}}"></script>
<script>
    document.getElementById('poule-form').addEventListener('submit', function(e) {
e.preventDefault();


const loader = document.getElementById('poule-loader');
loader.classList.remove('d-none');


const submitButton = document.getElementById('poule-submit');
submitButton.disabled = true;


setTimeout(() => {
this.submit(); 
}, 800);
});

    



</script>