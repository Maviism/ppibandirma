<?php

namespace App\Http\Livewire\Home;

use App\Models\Like;
use App\Models\Status;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Textcard extends Component
{
    public $statuses = [];
    public $status;

    

    protected $listeners = [
        'opiniCreated'
    ];

    public function likeStatus($id){
        if(!Auth::user()){
            return redirect('login');
        }
        $like = Like::create([
            'user_id' => Auth::user()->id,
            'status_id' => $id
        ]);

        $this->statuses = Status::orderBy('id', 'desc')->with(['like', 'comment'])->get();
    }
    
    public function unlikeStatus($status_id){
        $like = Like::where('user_id', Auth::user()->id)->where('status_id', $status_id);
        $like->delete();

        $this->statuses = Status::orderBy('id', 'desc')->with(['like', 'comment'])->get();
    }

    public function mount(){
        $this->statuses = Status::orderBy('id', 'desc')->with(['like', 'comment'])->get();
    }

    public function render()
    {   
        $likes = Like::select('status_id')->where('user_id', Auth::user()->id ?? '0')->get();    
        $likeArr = Arr::flatten($likes->toArray());
        return view('livewire.home.textcard', ['likes' => $likeArr]);
    }

    public function store(){
        $status = Status::create([
            'status' => $this->status,
            'user_id' => Auth::user()->id
        ]);

        $this->status = '';

        $this->emit('opiniCreated', $status->id);
    }

    public function opiniCreated($id){
        $this->statuses = Status::orderBy('id', 'desc')->get();
    }

}
