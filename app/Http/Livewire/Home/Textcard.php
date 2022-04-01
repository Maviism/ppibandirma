<?php

namespace App\Http\Livewire\Home;

use App\Models\Opinion;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Textcard extends Component
{
    public $opinions = [];
    public $opini;

    protected $listeners = [
        'opiniCreated'
    ];

    public function opiniCreated($id){
        $this->opinions = Opinion::orderBy('id', 'desc')->get();
    }

    public function mount(){
        $this->opinions = Opinion::orderBy('id', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.home.textcard');
    }

    public function store(){
        $opini = Opinion::create([
            'opini' => $this->opini,
            'user_id' => Auth::user()->id
        ]);

        $this->opini = '';

        $this->emit('opiniCreated', $opini->id);
    }

}
