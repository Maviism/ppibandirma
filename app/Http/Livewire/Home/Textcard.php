<?php

namespace App\Http\Livewire\Home;

use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Textcard extends Component
{
    public $statuses = [];
    public $status;

    protected $listeners = [
        'opiniCreated'
    ];

    public function opiniCreated($id){
        $this->statuses = Status::orderBy('id', 'desc')->get();
    }

    public function mount(){
        $this->statuses = Status::orderBy('id', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.home.textcard');
    }

    public function store(){
        $status = Status::create([
            'status' => $this->status,
            'user_id' => Auth::user()->id
        ]);

        $this->status = '';

        $this->emit('opiniCreated', $status->id);
    }

}
