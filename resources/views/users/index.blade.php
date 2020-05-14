@extends('layouts.app')

@section('content')
.<div class="container">

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>ROLES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td scope="row">{{ $user->id }}</td>
                <td>
                    <a href="{{route('users.show', ['user' => $user->id])}}" class="badge badge-info">{{ $user->name }}</a>
                </td>
                <td>{{ $user->email }}</td>
                <td>
                    @forelse ($user->roles as $role)
                        <spane class="badge badge-info">{{$role->role}}</spane>
                    @empty
                    <spane class="badge badge-warning">no roles</spane>
                    @endforelse
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
    
@endsection