<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DialogueWords extends Model
{
    use HasFactory;
    public function DialogueBase(){
        return $this->belongsTo('App\DialogueBase');
    }
}
