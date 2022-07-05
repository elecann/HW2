<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Post extends Model
{
    public function user(){

        
        return $this->belongsTo('App\Models\User');

    }
    protected $fillable = [
        'id',
        'user_id',
        'nickname',
        'foto',
    ];
}
    
