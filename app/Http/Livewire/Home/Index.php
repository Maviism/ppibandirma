<?php

namespace App\Http\Livewire\Home;

use App\Models\Opinion;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    

    public function render()
    {
        return view('livewire.home.index');
    }
}
