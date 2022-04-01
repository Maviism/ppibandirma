<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $fillable = ['opini', 'user_id'];

    public function getCreatedAtAttribute(){
        return Carbon::parse($this->attributes['created_at'])
            ->diffForHumans();
    }
    
}
