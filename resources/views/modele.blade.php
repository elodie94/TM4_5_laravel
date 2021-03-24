<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <style>
        .error {background-color: red;}
        .etat {background-color: lightblue;}
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
          crossorigin="anonymous">

</head>
<body>

@if ($errors->any())
    <div class="error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@section('menu')

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous"
    >
    </script>


@guest()
    <a href="{{route('login')}}">Login</a>
    <a href="{{route('register')}}">Register</a>
@endguest

    @auth()
        <a href="{{route('logout')}}">Logout</a>
        <a href="{{route('edit',['id'=>Auth::id()])}}">Modifier son mot de passe</a>
        <p>Bonjour {{Auth::user()}} {{AUTH::id()}}</p>
        <a href="{{route('pizzas.list_paginate')}}">Voir la liste de pizza</a>
    @endauth

    @auth()
        <p>Page administrateur</p>
        <a href="{{route('admin.home')}}">Aller sur la page d'admin</a>
    @endauth

@show
@section('etat')
    @if( session()->has('etat'))
        <p class="etat">{{session()->get('etat')}}</p>
    @endif
@endsection

@show

@yield('contents')

@show
</body>
</html>
