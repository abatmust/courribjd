@extends('layouts.app')

@section('content')

.<div class="container">
    <div class="row">
        <div class="col">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>EXPEDITEUR</th>
                        <th>OBJET</th>
                        <th>AFFECTE A</th>
                        <th>SECTION</th>
                        <th>REF BJD</th>
                        <th>REF SAF</th>
                        <th>OPERATIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mails as $mail)
                    
                    <tr>
                        <td scope="row">{{ $mail->id }}</td>
                        <td>{{ $mail->sender }}</td>
                        <td>{{ $mail->subject }}</td>
                        <td style='width: 18%'>
                            @forelse ($mail->users as $user)
                                <span class="badge badge-info">{{$user->name}}</span>
                            @empty
                            <span class="badge badge-warning">not yet affected</span>
                            @endforelse
                            @if (in_array('chef', Auth::user()->roles->pluck('role')->toArray()))
                                <form action="{{route('mail-user.store', ['mail' => $mail->id])}}" method="POST">
                                    @csrf
                                    <div class="input-group">
                                        <select name="assignto" id="assignto" class="custom-select custom-select-sm">
                                            @foreach ($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-outline-success">attacher</button>
                                        </div>

                                    </div>
                                </form>
                            @endif

                        </td>
                        <td>
                            {{$mail->section}}
                        </td>
                        <td>
                            
                            @if ( $mail && $mail->date_bjd )
                                <div class="badge badge-secondary">
                                    {{ " Reçu le:" . date('d/m/Y', strtotime($mail->date_bjd)) }}
                                </div>
                            @endif
                        </td>
                        
                        <td>
                            @if ( $mail->saf_arrived && $mail->saf_arrived->num_saf )
                                <div class="badge badge-primary">
                                    {{ "n°: ". $mail->saf_arrived->num_saf  }}
                                </div>
                            @endif
                            @if ( $mail->saf_arrived && $mail->saf_arrived->date_saf )
                                <div class="badge badge-secondary">
                                    {{ " du " . $mail->saf_arrived->date_saf }}
                                </div>
                            @endif
                            
                            <div class="badge badge-info">
                                {{ $mail->saf_arrived['observation'] }}
                            </div>
                            
                        </td>
                        
                        <td>
                            <form action="{{ route('mails.edit', ['mail' => $mail->id]) }}" method="GET">
                                <button type="submit" class="btn btn-primary btn-sm btn-block mb-2">modifier</button>
                            </form>
                            <form action="{{ route('mails.destroy', ['mail' => $mail->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm btn-block mb-2">Supprimer</button>
                            </form>
                            <a href="{{route('mails.show', ['mail' => $mail->id])}}" class="btn btn-info btn-sm btn-block">Détail</a>
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