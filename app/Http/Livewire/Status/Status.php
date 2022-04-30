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

    protected $listeners = [
        'commentCreatedListener',
        'likeStatusListener',
        'likeCommentListener'
    ];

    public function mount($id){
        $this->status = ModelsStatus::find($id);
        $this->comments = $this->status->comment;
    }

    public function render()
    {
        $likesStat = Like::select('status_id')->where('user_id', Auth::user()->id ?? '0')->get();    
        $likesComm = Like::select('comment_id')->where('user_id', Auth::user()->id ?? '0')->get();    
        $likeArrStat = Arr::flatten($likesStat->toArray());
        $likeArrComm = Arr::flatten($likesComm->toArray());
        return view('livewire.status.status', ['likes' => $likeArrStat, 'likesComment'=> $likeArrComm]);
    }

    public function likeStatus($status_id){
        if(!Auth::user()){
            return redirect('login');
        }
        $like = Like::create([
            'user_id' => Auth::user()->id,
            'status_id' => $status_id
        ]);

        $this->emit('likeStatusListener', $status_id);

    }
    
    public function unlikeStatus($status_id){
        $like = Like::where('user_id', Auth::user()->id)->where('status_id', $status_id);
        $like->delete();

        $this->emit('likeStatusListener', $status_id);
    }

    public function likeComment($comment_id){
        if(!Auth::user()){
            return redirect('login');
        }
        Like::create([
            'user_id' => Auth::user()->id,
            'comment_id' => $comment_id
        ]);

        $this->emit('likeCommentListener');
    }

    public function unlikeComment($comment_id){
        $like = Like::where('user_id', Auth::user()->id)->where('comment_id', $comment_id);
        $like->delete();

        $this->emit('likeCommentListener');
    }

    public function store($status_id){
        $comment = Comment::create([
            'comment' => $this->commentVal,
            'status_id' => $status_id,
            'user_id' => Auth::user()->id
        ]);

        $this->commentVal = '';

        $this->emit('commentCreatedListener', $status_id);
    }

    public function commentCreatedListener($status_id){
        $this->comments = Comment::where('status_id', $status_id)->orderBy('created_at')->get();
    }

    public function likeStatusListener($status_id){
        $this->status = ModelsStatus::find($status_id);
    }

    public function likeCommentListener(){
        $this->comments = $this->status->comment;
    }

}
