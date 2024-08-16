@extends('layout.base')


@section('content')
    @include('includes.topBar')
    <div class="users-list">
        <h3 class="align-center">Liste des utilisateurs <a href="{{ route('createUser') }}"> &nbsp;Créer</a></h3>
        
        <div class="border datatable-cover">
            <table width="100%" id="datatable" class="stripe">
                <thead>
                    <tr>
                        <th>Nom de l'utilisateur</th>
                        <th>Email de l'utilisateur</th>
                        <th>Opérations</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <div class="flex gap-10 operations">
                                    <a href="{{ route('users.edit', $user->id) }}" class="operation-button blue">
                                        <i class="fas fa-pen-to-square fa-xm"></i>
                                    </a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="operation-button red"><i
                                                class="fas fa-trash-can"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
