@extends('modele')

@section('title','Modification pizza')

@section('contents')

    <p>Modification pizza</p>

    <form action="{{route('pizzas.update',['id'=>$pizza->id])}}" method="post">
        @method('put')

        Nom: <input type="text" name="nom" value="{{old('nom')}}">
        Description: <input type="text" name="description" value="{{old('descrition')}}">
        Prix: <input type="numeric" name="prix" value="{{old('prix')}}">

        <input type="submit" value="Mofifier">
        @csrf
    </form>

@endsection
