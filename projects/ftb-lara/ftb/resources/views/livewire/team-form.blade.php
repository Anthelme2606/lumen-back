<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" enctype="multipart/form-data">
        @csrf
        <div class="mb-2">
            <input class="w-100 px-2 rounded input-team" wire:model.defer="teamName" placeholder="nom de la team ..">
            @error('teamName') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-2">
            <input class="w-100 px-2 rounded input-team" wire:model.defer="teamPseudo" placeholder="Team Pseudo">
            @error('teamPseudo') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-2">
            <input type="text" class="w-100 px-2 rounded input-team" wire:model.defer="repName" placeholder="nom du représentant">
            @error('repName') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-2">
            <div class="file-upload-wrapper">
                <div class="file-upload-input" data-placeholder="team logo"></div>
                <input id="input-image-1" type="file" wire:model="teamImage" class="file-upload-hidden">
                @error('teamImage') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="mb-2">
            <div class="file-upload-wrapper">
                <div class="file-upload-input" data-placeholder="Représentant logo"></div>
                <input id="input-image-2" type="file" wire:model="repImage" class="file-upload-hidden">
                @error('repImage') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="mb-2 d-flex justify-content-center">
            <button type="submit" class="px-4 py-2 rounded btn but-primary">
                <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true" wire:loading></span>
                Enregistrer la team
            </button>
        </div>
    </form>
</div>
