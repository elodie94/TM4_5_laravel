@extends('modele')

@section('title','Liste des produits')

@section('contents')

    @forelse($pizzas as $pizza)
        <ul>
            @if($loop->first)
                <li>{{$loop->iteration}} : {{$pizza->nom}} : {{$pizza->description}} : {{$pizza->prix}}</li>
            @endif

            @if($loop->last)
        </ul>
        @endif
    @empty
        <p>Il n'y a pas de pizzas</p>
        <a href="{{route('pizzas.create')}}">Ajouter une nouvelle pizza</a>
    @endforelse
    {{$pizzas->links()}}
@endsection
