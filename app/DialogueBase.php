<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DialogueBase extends Model
{
    use HasFactory;
    public function ClassBase(){
        return $this->belongsTo('App\ClassBase');
    }
    public function DialogueWord(){
        return $this->hasMany('App\DialogueWords');
    }
    public function DialogueVideos(){
        return $this->hasMany('App\DialogueVideo');
    }
}
