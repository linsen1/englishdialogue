<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomUser extends Model
{
    use HasFactory;
    public function UserFavorites(){
       return $this->hasMany(UserFavorite::class);
    }
}
