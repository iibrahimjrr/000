<?php

namespace App\Http\Controllers;

use App\Models\Chatbot;
use Illuminate\Http\Request;

class ChatbotageController extends Controller
{
    public function index()
    {
        return Chatbot::with('user')->get();
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'message'  =>  'required|string',
            'response' =>  'required|string',
            'user_id'  =>  'required|exists:users,id'
        ]);

        return Chatbot::create($validate);
    }

    public function show(Chatbot $chatbot)
    {
        return $chatbot->load('user');
    }

    public function destroy(Chatbot $chatbot)
    {
        $chatbot->delete();
        return response()->json(['message' => 'الرساله اتمسحت يا حبي']);
    }
}
