<?php

namespace App\Models;

use App\Models\User\UserItem;
use App\Models\User\UserList;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable,SoftDeletes;
         const GENDER_FEMALE="female";
         const GENDER_MALE="male";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = [
        'fullname',
        'email',
        'phone_number',
        'gender',
        'avatar',
        'age',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userlist(){
        return $this->hasMany(UserList::class);
    }

    public function listitem(){
        return $this->hasMany(UserItem::class);
    }
}
