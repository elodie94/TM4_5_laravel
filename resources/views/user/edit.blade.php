@extends('modele')

@section('title','Modification mot de passe')

@section('contents')

    <p>Modification mot de passe</p>
    <form action="{{route('update',['id'=>$user->id])}}" method="post">
        @method('put')

        MDP: <input type="password" name="mdp">
        Confirmation MDP: <input type="password" name="mdp_confirmation">

        <input type="submit" value="Modifier">
        @csrf
    </form>

@endsection
