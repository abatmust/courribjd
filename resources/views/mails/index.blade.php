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
                        <th>SAF</th>
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
                        <td>
                            @if ($mail->saf_arrived['num_saf'])
                                <div class="badge badge-primary">
                                    {{ "n°: ". $mail->saf_arrived['num_saf']  }}
                                </div>
                            @endif
                            @if ($mail->saf_arrived['date_saf'])
                                <div class="badge badge-secondary">
                                    {{ " du " . $mail->saf_arrived->date_saf }}
                                </div>
                            @endif
                            
                            <div class="badge badge-info">
                                {{ $mail->saf_arrived['observation'] }}
                            </div>
                            
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