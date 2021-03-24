<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetMdpController extends Controller
{
    public function edit(Request $request, $id){
        $user=User::findOrFail($id);

        return view('user.edit',['user'=>$user]);
    }

    public function update(Request $request,$id){
        $user= User::findOrFail($id);

        $request->validate([
            'mdp' => 'required|string|confirmed'
        ]);

        $user->mdp=Hash::make($request->mdp);

        $user->save();

        $request->session()->flash('etat','Mot de passe modifié');

        return redirect()->route('home');
    }
}
