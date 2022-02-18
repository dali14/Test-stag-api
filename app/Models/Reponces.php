<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponces extends Model
{
    use HasFactory;
    protected $fillable = [

        'reponce',
        'type',
        'nature',
        'questions_id'
        
    ];

    
}
