<?php

namespace App\Http\Livewire\Status;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Status as ModelsStatus;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Status extends Component
{
    public $status;
    public $comments = [];
    public $commentVal;

    public function mount($id){
        $this->status = ModelsStatus::find($id);
        $this->comments = $this->status->comment;
    }

    public function render()
    {
        $likes = Like::select('status_id')->where('user_id', Auth::user()->id ?? '0')->get();    
        $likeArr = Arr::flatten($likes->toArray());
        return view('livewire.status.status', ['likes' => $likeArr]);
    }

    public function likeStatus($status_id){
        if(!Auth::user()){
            return redirect('login');
        }
        $like = Like::create([
            'user_id' => Auth::user()->id,
            'status_id' => $status_id
        ]);

    }
    
    public function unlikeStatus($status_id){
        $like = Like::where('user_id', Auth::user()->id)->where('status_id', $status_id);
        $like->delete();

    }

    public function store($status_id){
        $comment = Comment::create([
            'comment' => $this->commentVal,
            'status_id' => $status_id,
            'user_id' => Auth::user()->id
        ]);

        $this->commentVal = '';
    }

}
