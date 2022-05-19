<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'added_by',
        'amount', 
        'transaction_date', 
        'description', 
        'type',
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function addedBy(){
        return User::find($this->attributes['added_by'])->name;
    }

}


