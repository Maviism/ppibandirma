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
        'slug',
        'place',
        'date',
        'time',
        'thumbnail',
        'description',
    ];

    public function rating(){
        return $this->hasMany(Rating::class);
    }

    public function dateFormat(){
        $dt = Carbon::parse($this->attributes['date']);
        return $dt->isoFormat('dddd, D MMMM Y');
    }

    public function dates(){
        $dt = Carbon::parse($this->attributes['date']);
        return $dt->isoFormat('Y-m-d H:i');
    }

    public function getTime(){

    }

    public function getLatestEvent(){

    }

    public function getUpcomingEvent(){

    }

    public function limitText(){
        return Str::limit($this->description, Event::LIMIT);
    }



}
