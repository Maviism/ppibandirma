<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NipCounter extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'counter'
    ];
}
