@extends('modele')

@section('title','Liste pizzas')

@section('contents')

    @forelse($pizzas as $pizza)
        @if($loop->first)
            <table>
                <tr><th>Nom pizzas</th><th>Description</th><th>Prix</th></tr>

        @endif
                <tr><td>{{$pizza->nom}} </a></td><td>{{$pizza->description}}</td><td>{{$pizza->prix}}</td><td><a href="{{route('pizzas.edit',['id'=>$pizza->id])}}">Modifier</a></td></tr>
        @if($loop->last)
            </table>

            <a href="{{route('pizzas.create')}}">Ajouter une nouvelle pizza</a>
        @endif
    @empty
        <p>Il n'y a pas de pizzas</p>
        <a href="{{route('pizzas.create')}}">Ajouter une nouvelle pizza</a>
    @endforelse

@endsection
