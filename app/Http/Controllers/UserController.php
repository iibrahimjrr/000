<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        return User::all();
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name'     => 'required',
            'username' => 'required|unique:users',
            'email'    => 'required|unique:users',
            'password' => 'required|min:10',
            'age'      => 'nullable|integer'
        ]);

        $validated['password'] = Hash::make($request->password);

        return User::create($validated);
    }

    public function show(User $user){
        return $user;
    }

    public function update(Request $request, User $user){
        $validated = $request->validate([
            'name'     => 'sometimes|required',
            'username' => 'sometimes|required|unique:users,username,' . $user->id,
            'email'    => 'sometimes|required|unique:users,email,' . $user->id,
            'age'      => 'nullable|integer'
        ]);

        $user->update($validated);
        return $user;
    }
    
    public function destroy(User $user){
        $user->delete();
        return response()->json(['message' => 'المستخدم اتمسح يا قلبي']);
    }
}
