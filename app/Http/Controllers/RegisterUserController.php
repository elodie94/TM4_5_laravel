<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(Request $request){
        $request->validate([
            'nom' => 'required|string|max:50',
            'prenom'=> 'required|string|max:50',
            'login' => 'required|string|max:30|unique:users',
            'mdp' => 'required|string|confirmed' //|min:8
        ]);

        $user = new User();
        $user->nom = $request->nom;
        $user->prenom=$request->prenom;
        $user->login = $request->login;
        $user->mdp = Hash::make($request->mdp);
        $user->save();
        session()->flash('etat','User add');

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);

    }
}
