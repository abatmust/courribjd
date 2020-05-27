@extends('layouts.app')

@section('content')

.<div class="container">
    <div class="row">
        <div class="col">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>SENDER</th>
                        <th>SUBJECT</th>
                        <th>AFFECTED TO</th>
                        <th>SECTION</th>
                        <th>BJD</th>
                        <th>SAF</th>
                        <th>DIR</th>
                        <th>Opérations</th>
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
                            @if ( $mail && $mail->num_bjd )
                                <div class="badge badge-primary">
                                    {{ "n°: ". $mail->num_bjd  }}
                                </div>
                            @endif
                            @if ( $mail && $mail->date_bjd )
                                <div class="badge badge-secondary">
                                    {{ " du " . $mail->date_bjd }}
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
                            @if ($mail->dir_arrived['num_dir'])
                                <div class="badge badge-primary">
                                    {{ "n°: ". $mail->dir_arrived['num_dir']  }}
                                </div>
                            @endif
                            @if ($mail->dir_arrived['date_dir'])
                                <div class="badge badge-secondary">
                                    {{ " du " . $mail->dir_arrived->date_dir }}
                                </div>
                            @endif
                            
                           
                            
                        </td>
                        <td>
                        <form action="{{ route('mails.edit', ['mail' => $mail->id]) }}" method="GET">
                                <button type="submit" class="btn btn-primary btn-sm">modifier</button>
                            </form>
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