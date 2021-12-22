<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavorite extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function CustomUsers(){
        return $this->belongsTo(CustomUser::class);
    }

    public function DialogueInfo()
    {
        return  $this->hasOne(DialogueBase::class,'id','fav_info_id');
    }
}
