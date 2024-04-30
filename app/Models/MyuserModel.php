<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class MyuserModel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $guard = 'myuser';
     protected $table = 'myuser';
     protected $fillable = ['name', 'email', 'password','image','status','role'];

     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

}
