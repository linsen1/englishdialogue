<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DialogueVideo extends Model
{
    use HasFactory;
    public function DialogueBase(){
        return $this->belongsTo('App\DialogueBase');
    }
}
