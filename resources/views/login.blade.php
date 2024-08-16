@extends('layout.base')

@section('content')
    <main class="container">
        <form action="{{ route('authenticate') }}" method="POST">
            @csrf
            <h1 style="text-align: center">Espace de connexion</h1>
    
            @if ($errors->any())
                <ul class="alert alert-danger">
                    {!! implode('', $errors->all('<li>:message</li>')) !!}
                </ul>
            @endif
    
            @if ($message = Session::get('error'))
                <div class="error">{{ $message }}
            @endif
    
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Saisir l'email ici ...">
    
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password"placeholder="Saisir le mot de passe ici ...">
    
            <button type="submit">Soumettre</button>
        </form>
    </main>
@endsection
