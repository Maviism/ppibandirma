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
    public $show_name = 0;

    protected $rules = [
        'status' => 'required|min:3',
    ];    

    protected $messages = [
        'status.required' => 'Kamu belum menulis status.',
        'status.min' => 'Status minimal mengandung 3 kata.',
    ];

    protected $listeners = [
        'statusCreated',
        'statusDestroyed'
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
        $this->validate();

        $status = Status::create([
            'status' => $this->status,
            'user_id' => Auth::user()->id,
            'hide_name' => $this->show_name,
        ]);

        $this->status = '';

        $this->emit('statusCreated', $status->id);
    }

    public function statusCreated($id){
        $this->statuses = Status::orderBy('id', 'desc')->get();
    }

    public function destroy($id){
        Status::destroy($id);

        $this->emit('statusDestroyed');
    }

    public function statusDestroyed(){
        $this->statuses = Status::orderBy('id', 'desc')->get();
    }

}
