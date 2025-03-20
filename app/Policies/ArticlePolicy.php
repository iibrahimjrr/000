<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ArticlePolicy
{
    public function update(User $user, Article $article)
    {
        return $user->id === $article->admin_id
        ? Response::allow()
        : Response::deny('ليس لديك الصلاحيه للتعديل المقال');
    }
}    
