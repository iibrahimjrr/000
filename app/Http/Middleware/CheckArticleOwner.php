<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;


class CheckArticleOwner
{
    public function handle(Request $request, Closure $next)
    {
        $articleID = $request->route('id');
        $article   = Article::find($articleID);

        if (!$article || $article->admin_id !== Auth::id())
        {
            abort(403, 'ليس لديك الصلاحيه يا حرامي ');
        }

        return $next($request);
    }
}

