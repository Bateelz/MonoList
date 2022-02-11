<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserList extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=['user_id','name','type','color'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
