@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3 dir="rtl" class="text-right">مرحبا بكم ...</h3>

                    <p style="font-size: 8pt; color:orangered; background-color: palegreen; border-radius: 5px; padding: 5px" class="col-6">Pour éviter les doublons dans l'enregistrement du courrier, il serait utile de s'assurer que le courrier en question n'existe déja dans la liste <a style="display: inline" href="{{route('mails.index')}}" class="nav-link active">(cliquez ici pour vérifier)</a></p>
                    
                    {{-- <nav class="nav justify-content-center">
                      <a class="nav-link active" href="{{route('users.index')}}">users</a>
                      <a class="nav-link active" href="{{route('mails.index')}}">mails</a>
                      <a class="nav-link active" href="{{route('mails.create')}}">nouveau courrier</a>
                      <a class="nav-link" href="#">Link</a>
                      <a class="nav-link disabled" href="#">Disabled link</a>
                    </nav> --}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
