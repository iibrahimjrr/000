<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return Page::all();
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'title'   => 'required',
            'content' => 'required'
        ]);

        return Page::create($validate);   
    }

    public function show(Page $page)
    {
        return $page;
    }

    public function update(Request $request, Page $page)
    {
        $validate = $request->validate([
            'title'   => 'sometimes|required',
            'content' => 'sometimes|required'
        ]);

        $page->update($validate);
        return $page;
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return response()->json(['message' => 'الصفحه اتمسحت يا قلب اخوك']);
    }
}
