<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    //
    public function create(){
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'mdp' => 'required|string'
        ]);

        $credentials = ['login' => $request->input('login'),
                        'password' => $request->input('mdp')];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $request->session()->flash('etat','Login succesfully');

            return redirect()->intended('home');
        }

        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.',
        ]);
    }

    public function edit(Request $request, $id){
        $user=User::findOrFail($id);

        return view('auth.edit',['user'=>$user]);
    }

    public function update(Request $request,$id){
        $user= User::findOrFail($id);

        $request->validate([
            'mdp' => 'required|string|confirmed'
        ]);

        $user->mdp=$request->mdp;

        $user->save();

        $request->session()->flash('etat','Mot de passe modifié');

        return redirect()->route('home');
    }

    public function destroy(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
