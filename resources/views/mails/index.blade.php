@extends('layouts.app')

@section('content')

.<div class="container">
    <div class="row">
        <div class="col">
            <input dir="rtl" id="myInput" type="text" placeholder="بحث ..." class="float-right form-control my-3 d-print-none" style="width:20%">
           
            <table id="myTable" class="table table-sm table-hover">
                <thead>
                    <tr class="row">
                        <th class="col-0.5">ID</th>
                        <th class="col">EXPEDITEUR</th>
                        <th class="col-2">OBJET</th>
                       
                        @cannot('is_agent')
                        <th class="col">AFFECTE A</th>
                        @endcannot
                        <th class="col">SECTION</th>
                        <th class="col-2">BJD OBSERVATION</th>
                        <th class="col">REF BJD</th>
                        <th class="col">REF SAF</th>
                        <th class="d-print-none col">OPERATIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mails as $mail)
                    {{-- @can('seeMail', $mail) --}}
                    <tr class="rowData row">
                        <td class="col-0.5" scope="row">{{ $mail->id }}</td>
                        <td class="col wrap">{{ $mail->sender }}</td>
                        <td class="col-2">{{ $mail->subject }}</td>
                        @cannot('is_agent')
                        <td class="col">
                            @forelse ($mail->users as $user)
                                <span class="badge badge-info">{{$user->name}}</span>
                            @empty
                            <span class="badge badge-warning"> . . . </span>
                            @endforelse
                            @can('is_os')
                            <div class="d-print-none">
                                <form action="{{route('mail-user.store', ['mail' => $mail->id])}}" method="POST">
                                    @csrf
                                    <div class="input-group">
                                        <select name="assignto"  class="custom-select custom-select-sm">
                                                <option value="">Choisir</option>
                                            @foreach ($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-outline-success">Basculer</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            @endcan

                        </td>
                        @endcannot
                        <td class="col">
                            {{$mail->section}}
                        </td>
                        <td class="col-2">
                            {{$mail->observation_bjd ?? ''}}
                        </td>
                        <td class="col">
                            
                            @if ( $mail && $mail->date_bjd )
                                <div class="badge badge-secondary">
                                    {{ " Reçu le:" . date('d/m/Y', strtotime($mail->date_bjd)) }}
                                </div>
                            @endif
                        </td>
                        
                        <td class="col">
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
                        
                        <td class="col">
                            <div class="d-print-none">
                            @can('is_admin')
                            <form class="d-inline" action="{{ route('mails.edit', ['mail' => $mail->id]) }}" method="GET">
                                <button type="submit" class="btn btn-primary btn-sm d-inline"><i class="fa fa-edit"></i></button>
                            </form>
                            <form class="d-inline" action="{{ route('mails.destroy', ['mail' => $mail->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm d-inline delete_btn"><i class="fa fa-trash"></i></button>
                            </form>
                            @endcan
                            
                            <a href="{{route('mails.show', ['mail' => $mail->id])}}" class="btn btn-warning btn-sm"><i class="fa fa-search-plus"></i></a>
                        </div>
                       
                        </td>
                    </tr>
                    {{-- @endcan --}}
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
@push('scripts')
<script>
    $(document).ready(function(){

        
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr.rowData").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
         });
         $('.delete_btn').on('click', function(event){
            event.preventDefault();
            swal.fire({
            title: 'هل أنت متأكد ؟',
            text: "! لن يكون بإمكانك التراجع ",
            icon: 'question',
            iconHtml: '؟',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'نعم',
            cancelButtonText: 'لا',
            showCancelButton: true,
            showCloseButton: true
      

            }).then((result) => {
            if (result.value) {
            event.target.form.submit();
                Swal.fire(
                'حذف !',
                'تم الحذف.',
                'success'
                )
            }
            })
        });
        
       
    });
</script>
@endpush
