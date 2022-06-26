<?php

namespace App\Http\Livewire\Event;

use App\Models\Event;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.event.index' , [
            'events' => Event::all(),
            'upcomingEvents' => Event::where('date', '>', date('Y-m-d H:i'))->get()
        ]);
    }
}


