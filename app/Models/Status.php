<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function like(){
        return $this->hasMany(Like::class);
    }

    protected $fillable = ['status', 'user_id'];

    public function getCreatedAtAttribute(){
        return Carbon::parse($this->attributes['created_at'])
            ->diffForHumans();
    }

    
    
}
