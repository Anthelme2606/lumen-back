<link rel="stylesheet" href="{{asset('assets/css/form.css')}}">
<div class="modal fade" id="teamModal" tabindex="-1" aria-labelledby="teamModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="teamModalLabel">Création d'équipe</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form   id="team-form" method="post" action="{{ route('store-team') }}"  enctype="multipart/form-data">
                    @method('POST')
                     @csrf
                     <div class="mb-2">
                        <label for="team-name" class="form-label">Nom de l' équipe</label>
                        <input type="text" name="team-name" id="team-name" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="team-pseudo" class="form-label">Pseudo de l'quipe</label>
                        <input type="text" name="team-pseudo" id="team-pseudo" class="form-control" required>
                    </div>
                    <div class="uploader">
                        <img id="teamImage" src="https://via.placeholder.com/100x50" alt="Logo">
                        <input type="file" id="team-image" name="team-image" class="d-none" accept="image/*" onchange="displayImage(this, 'teamImage')">
                        <label for="team-image" class="btn-upload">Charger le logo pour l' équipe</label>
                   
                    </div>
                    <div class="mb-2">
                        <label for="rep-name" class="form-label">Nom du coach</label>
                        <input type="text" name="rep-name" id="rep-name" class="form-control" required>
                    </div>
                    <div class="uploader">
                        <img id="repImage" src="https://via.placeholder.com/100x50" alt="Logo">
                        <input type="file" id="rep-image" name="rep-image" class="d-none" accept="image/*" onchange="displayImage(this, 'repImage')">
                        <label for="rep-image" class="btn-upload">Charger le logo pour le coach</label>
                   
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn but-primary " id="team-submit">
                            <span id="team-loader" class="spinner-border spin-l text-success spinner-border-sm d-none"></span>
                            Création d'équipe
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/js/form.js')}}"></script>
<script>
    document.getElementById('team-form').addEventListener('submit', function(e) {
e.preventDefault();


const loader = document.getElementById('team-loader');
loader.classList.remove('d-none');


const submitButton = document.getElementById('team-submit');
submitButton.disabled = true;


setTimeout(() => {
this.submit(); 
}, 800);
});
</script>