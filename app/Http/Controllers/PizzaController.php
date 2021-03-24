<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function index(){
        $pizzas=Pizza::all();

        //$this->authorize('view');

        return view('pizzas.list',['pizzas'=>$pizzas]);
    }

    public function pizzasListPaginate(Request $request){
        $pizzas = Pizza::paginate(15);

        return view('pizzas.list_paginate',['pizzas'=>$pizzas]);
    }


    public function create(){
        return view('pizzas.create');
    }

    public function store(Request $request){

        $request->validate([
            'nom'=>'required|string|max:30',
            'description'=>'required|string|max:50',
            'prix'=>'required|numeric|between:0,99.99',
        ]);

        $pizza=new Pizza();
        $pizza->nom = $request->nom;
        $pizza->description = $request->description;
        $pizza->prix = $request->prix;

        //$this->authorize('create',$id);
        $request->session()->flash('etat','Ajout de la pizza effectué');

        $pizza->save();

        return redirect()->route('pizzas.index');
    }

    public function edit(Request $request, $id){
        $pizza=Pizza::findOrFail($id);

        return view('pizzas.edit',['pizza'=>$pizza]);
    }

    public function update(Request $request, $id){
        $pizza= Pizza::findOrFail($id);

        $request->validate([
            'nom'=>'required|string|max:30',
            'description'=>'required|string|max:50',
            'prix'=>'required|numeric|between:0,99.99',
        ]);

        $pizza->nom=$request->nom;
        $pizza->description=$request->description;
        $pizza->prix=$request->prix;

        $pizza->save();

        $request->session()->flash('etat','Pizza modifiée');

        return redirect()->route('pizzas.index');
    }

}
