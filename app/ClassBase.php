<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassBase extends Model
{
    protected  $fillable = ['class_name','class_pic','class_order','class_type'] ;
    use HasFactory;

    public function DialogueBase(){
        return $this->hasMany('App\DialogueBase');
    }
}
