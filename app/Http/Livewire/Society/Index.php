<?php

namespace App\Http\Livewire\Society;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $users = [];
    public $search = '';

    public function mount(){
    }
    
    public function render()
    {
        $this->users = User::where('name', 'like', '%'. $this->search .'%')->orderBy('name')->get();
        return view('livewire.society.index');
    }
}
