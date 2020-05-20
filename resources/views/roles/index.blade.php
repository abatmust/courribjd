@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="text-center">Gestion des rôles</h1>
    <div class="row">
        <div class="col-8 border border-info px-4 rounded">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">ROLE</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                    <tr>
                        <td class="text-center" scope="row">{{$role->id}}</td>
                        <td class="text-center">{{$role->role}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2" class="text-center"><h2>Aucun rôle, veuillez en saisair...!</h2></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-4">
            <form action="{{ route('roles.store') }}" method="POST" class="border border-info rounded p-4">
                @csrf
                <div class="form-group">
                    <label for="role">Role:</label>
                    <input id="role" name="role" type="text" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
                <x-errors></x-errors>
            </form>
        </div>
    </div>
    


</div>
@endsection