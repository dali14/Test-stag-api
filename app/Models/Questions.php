<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;
    protected $fillable = [

        'question',
        'rep1',
        'rep2',
        'rep3',
        'repV',
        'time'
    ];
}
