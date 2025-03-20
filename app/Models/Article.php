<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Comment;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'admin_id'];

    public function admin(){
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
