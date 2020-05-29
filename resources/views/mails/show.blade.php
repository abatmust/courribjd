@extends('layouts.app')

@section('content')


<div class="container">
    <h1>Détail d'un courrier</h1>
    <div class="row">
        <div class="col-8 p-3">
            <div class="row border border-dark rounded p-3 mb-3">
                <div class="col-6">
                    <u>EXPEDITEUR:</u>
                    <b style="margin-left:1em">{{$mail->sender}}</b>
                </div>
                <div class="col-6">
                    <u>OBJET:</u>
                    <b style="margin-left:1em">{{$mail->subject}}</b>
                </div>
                <div class="col-4">
                    <u>N° BJD:</u>
                   <b style="margin-left:1em">{{$mail->num_bjd}}</b>
                </div>
            
                <div class="col-4">
                    <u>DATE BJD:</u>
                    <b style="margin-left:1em">{{$mail->date_bjd}}</b>
                </div>
                <div class="col-4">
                    <u>SECTION:</u>
                    <b style="margin-left:1em">{{$mail->section}}</b>
                </div>
            </div>
            <div class="row border border-dark rounded p-3 mb-3">
                <div class="col-3">
                    <u>N° SAF:</u>
                    <b style="margin-left:1em">{{$mail->saf_arrived->num_saf}}</b>
                </div>
                <div class="col-4">
                    <u>DATE SAF:</u>
                    <b style="margin-left:1em">{{$mail->saf_arrived->date_saf}}</b>
                </div>
                <div class="col-4">
                    <u>OBSERVATION SAF:</u>
                    <b style="margin-left:1em">{{$mail->saf_arrived->observation}}</b>
                </div>
            </div>
            <div class="row border border-dark rounded p-3 mb-3">
                <div class="col-4">
                    <u>N° DIR:</u>
                    <b style="margin-left:1em">{{$mail->dir_arrived->num_dir}}</b>
                </div>
                <div class="col-4">
                    <u>DATE DIR:</u>
                    <b style="margin-left:1em">{{$mail->dir_arrived->date_dir}}</b>
                </div>
            </div>
            <div class="row border border-dark rounded p-3 mb-3">
                <div class="col">
                    <form action="{{ route('mails.edit', ['mail' => $mail->id]) }}" method="GET">
                        <button type="submit" class="btn btn-primary btn-sm btn-block mb-2">modifier</button>
                    </form>
                </div>
                <div class="col">
                    <form action="" method="GET">
                        <input type="file" class="form-control-file">
                    </form>
                </div>
                <div class="col">
                    <div>
                        Ajouté : <span class="badge badge-dark">{{$mail->created_at->diffForHumans()}}</span>
                    </div>
                    <div>
                        Modifié : <span class="badge badge-warning">{{$mail->updated_at->diffForHumans()}}</span>
                    </div>
                </div>
            </div>
                
            
        </div>
        <div class="col-4">
            <div class="card p-4">
                {{$mail}}
            </div>
        </div>
    </div>
</div>



@endsection