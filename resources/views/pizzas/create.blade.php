@extends('modele')

@section('title','Ajout pizza')

@section('contents')

    <p>Ajout d'une nouvelle pizza</p>

    <form action="" method="post">
        Nom: <input type="text" name="nom" value="{{old('nom')}}">
        Description: <input type="text" name="description" value="{{old('description')}}">
        Prix: <input type="numeric" name="prix" value="{{old('prix')}}"> €

        <input type="submit" value="Envoyer">
        @csrf
    </form>

@endsection
