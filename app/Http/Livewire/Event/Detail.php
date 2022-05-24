<?php

namespace App\Http\Livewire\Event;

use App\Models\Event;
use App\Models\Rating;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Detail extends Component
{
    public $event;
    public $sumRate;
    public $show_name = 0;
    public $comment;
    public $slug;

    public $star = 0;

    protected $listener = [
        'ratingCreated'
    ];

    protected $rules = [
        'comment' => 'nullable|min:3'
    ];


    public function setStar($val){
        $this->star = $val;
    }

    public function mount($slug){
        $this->event = Event::where('slug', $slug)->firstOrFail();
        $this->sumRate = Rating::where('event_id', $this->event->id)->avg('rate');
    }


    public function render()
    {   
        $rated = Rating::select('event_id')->where('user_id', Auth::user()->id ?? '0')->get();
        $isRated = Arr::flatten($rated->toArray());
        return view('livewire.event.detail', ['isRated' => $isRated]);
    }

    public function store(){
        $this->validate();
        
        $review = Rating::create([
            'event_id' => $this->event->id,
            'user_id' => Auth::user()->id,
            'rate' => $this->star,
            'review' => $this->comment,
            'show_name' => $this->show_name,
        ]);

        $this->emit('ratingCreated', $review->id);
    }


}
