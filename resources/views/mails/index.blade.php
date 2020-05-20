@extends('layouts.app')

@section('content')
.<div class="container">

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>SENDER</th>
                <th>SUBJECT</th>
                <th>AFFECTED TO</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mails as $mail)
            <tr>
                <td scope="row">{{ $mail->id }}</td>
                <td>{{ $mail->sender }}</td>
                <td>{{ $mail->subject }}</td>
                <td>
                    @forelse ($mail->users as $user)
                        <spane class="badge badge-info">{{$user->name}}</spane>
                    @empty
                    <spane class="badge badge-warning">not yet affected</spane>
                    @endforelse
                </td>
            </tr>
            @empty
            <h1>no mails in the database</h1>
            @endforelse
        </tbody>
    </table>
    
</div>
    
@endsection