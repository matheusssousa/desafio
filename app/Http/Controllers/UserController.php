<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('perfil.index', compact('user'));
    }

    public function accountInfo(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($request->user()->id),
            ],
        ]);
        
        $request->user()->update($request->only('name', 'email'));

        $user = auth()->user();

        return view('perfil.index', compact('user'));
    }

    public function password(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        $user = auth()->user();

        return view('perfil.index', compact('user'));
    }

    public function delete(Request $request)
    {
        $request->user()->delete();

        return redirect()->route('home');
    }
}
