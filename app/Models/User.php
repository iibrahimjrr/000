<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Chatbot;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name', 'username', 'email', 'password', 'age', 'role'];
    protected $hidden   = ['password'];

    public function articles(){
        return $this->hasMany(Article::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
    
    public function chatbots(){
        return $this->hasMany(Chatbot::class);
    }
}
