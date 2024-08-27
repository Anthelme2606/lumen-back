<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Controllers\Teams\TeamController; 

class TeamForm extends Component
{
    use WithFileUploads;

    public $teamName;
    public $teamPseudo;
    public $repName;
    public $teamImage;
    public $repImage;

    protected $rules = [
        'teamName' => 'required|string|max:255',
        'teamPseudo' => 'required|string|max:255',
        'repName' => 'required|string|max:255',
        'teamImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'repImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ];

    public function submit()
    {
        $this->validate();

        // Appel au service pour traiter la logique
        app(TeamController::class)->store([
            'teamName' => $this->teamName,
            'teamPseudo' => $this->teamPseudo,
            'repName' => $this->repName,
            'teamImage' => $this->teamImage,
            'repImage' => $this->repImage,
        ]);

        session()->flash('message', 'Team enregistrée avec succès!');
        $this->reset();
    }

    public function render()
    {
       
        return view('livewire.team-form');
    }
}
