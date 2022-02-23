<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reponce ;
class Questions extends Model
{
    use HasFactory;
    public function getReponces()
    {

        return $this->hasMany('App\Models\Reponces');
    }
    protected $fillable = [

        'question',
        'niveau',
        'time',
        'type',
        'etat',
        
    ];

}
