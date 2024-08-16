@extends('layout.base')


@section('content')
    @include('includes.topbar')
    <main class="container">
        <form action="{{ route('userCreate') }}" method="post">
            @csrf


            <div class="error-zone">
                @if ($errors->any())
                    <ul class="alert alert-danger">
                        {!! implode('', $errors->all('<li>:message</li>')) !!}
                    </ul>
                @endif

                @if ($message = Session::get('error'))
                    <div class="error">{{ $message }}
                @endif
            </div>

            <h3 class="">Remplissez le formulaire suivant pour créer un nouvel utilisateur</h3>

            <label for="fullname">Entrez le nom de l'utilsateur</label>
            <input type="text" name="fullname" id="fullname" placeholder="Entrez le nom complet de l'utilisteur">

            <label for="fullname">Entrez l'adresse e-mail de l'utilisateur</label>
            <input type="email" name="email" id="email" placeholder="Entrez l'adresse e-mail de l'utilisteur">

            <button type="submit">Soumettre</button>

        </form>
    </main>
@endsection
