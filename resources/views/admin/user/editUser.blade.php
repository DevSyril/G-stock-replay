@extends('layout.base')


@section('content')
@include('includes.topBar')
    <main class="container">
        <form action="{{ route('users.update', $user->id) }}" method="post">
            @csrf

            @method('PATCH')

            @if ($errors->any())
                <ul class="alert alert-danger">
                    {!! implode('', $errors->all('<li>:message</li>')) !!}
                </ul>
            @endif
    
            @if ($message = Session::get('error'))
                <div class="error">{{ $message }}
            @endif

            <h3 class="">Remplissez le formulaire suivant modifier l'utilisateur</h3>

            <label for="fullname">Entrez le nom de l'utilsateur</label>
            <input type="text" name="fullname" id="fullname" placeholder="{{ $user->name }}"><br />

            <button type="submit">Soumettre</button>

        </form>
    </main>
@endsection
