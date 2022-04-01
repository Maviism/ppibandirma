<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;

    const LIMIT = 50;

    protected $fillable = [
        'event_name',
        'event_place',
        'date',
        'thumbnail',
        'description',
    ];

    public function getCreatedAtAttribute(){
        return Carbon::parse($this->attributes['date'])
            ->diffForHumans();
    }

    public function limitText(){
        return Str::limit($this->description, Event::LIMIT);
    }

}
