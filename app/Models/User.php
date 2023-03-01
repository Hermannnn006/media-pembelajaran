<?php

namespace App\Models;

use App\Models\Materi;
use App\Models\Chalengge;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function materis(){
        return $this->hasMany(Materi::class);
    }

    public function chalenggesAdmin(){
        return $this->hasMany(Chalengge::class);
    }

    public function chalengges()
    {
        return $this->belongsToMany(Chalengge::class, 'chalengge_user')->withTimestamps();
    }
}
