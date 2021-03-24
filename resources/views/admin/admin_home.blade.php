@extends('modele')

@section('title','Page administrateur')

@section('contents')
    <p>Bienvenue sur la page admin</p>
    <a href="{{route('pizzas.index')}}">Voir la liste de pizzas</a>
@endsection
