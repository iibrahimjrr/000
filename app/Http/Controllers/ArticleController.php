<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Policies\ArticlePolicy;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function show($id){
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);

        if (Auth::id() !== $article->admin_id) {
            return redirect()->back()->with('error', 'ليس لديك صلاحية لتعديل هذا المقال.');
        }

        return view('article.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        if (Auth::id() !== $article->admin_id) {
            return redirect()->back()->with('error', 'ليس لديك صلاحية لتحديث هذا المقال.');
        }


        $request->validate([
            'title'   => 'required|string|max:250',
            'content' => 'required|string'
        ]);
        
        $article->update($request->only([
            'title', 'content'
        ]));

            return redirect()->route('article.show', $article->id)->with('success', 'تم تحدبث المقال ي حبيب قلبي');

        }
    }
