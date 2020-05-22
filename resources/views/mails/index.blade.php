@extends('layouts.app')

@section('content')
.<div class="container">
    <div class="row">
        <div class="col">
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
                                <span class="badge badge-info">{{$user->name}}</span>
                            @empty
                            <span class="badge badge-warning">not yet affected</span>
                            @endforelse
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan ="4"><h1 class="text-center">no mails in the database</h1></td>
                    </tr>
                    
                    @endforelse
                </tbody>
            </table>

        </div>
       

        </div>
    </div>
    
    
</div>
    
@endsection