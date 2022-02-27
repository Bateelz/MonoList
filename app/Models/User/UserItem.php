<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserItem extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['list_id', 'user_id', 'name','is_complete'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
