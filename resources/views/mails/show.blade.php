@extends('layouts.app')

@section('content')


<div class="container">
    <h1>Détail d'un courrier</h1>
    <div class="row">
        <div class="col-8 p-3">
            <div class="row border border-primary rounded p-3 mb-3">
                <div class="col-6">
                    EXPEDITEUR:
                    <b style="margin-left:1em">{{$mail->sender}}</b>
                </div>
                <div class="col-6">
                    OBJET:
                    <b style="margin-left:1em">{{$mail->subject}}</b>
                </div>
                <div class="col-3">
                    N° BJD:
                   <b style="margin-left:1em">{{$mail->num_bjd}}</b>
                </div>
            
                <div class="col-4">
                    DATE BJD:
                    <b style="margin-left:1em">{{date('d/m/Y', strtotime($mail->date_bjd))}}</b>
                </div>
                <div class="col-5">
                    SECTION:
                    <b style="margin-left:1em">{{$mail->section}}</b>
                </div>
            </div>
            <div class="row border border-primary rounded p-3 mb-3">
                <div class="col-3">
                    N° SAF:
                    <b style="margin-left:1em">{{$mail->saf_arrived->num_saf}}</b>
                </div>
                <div class="col-4">
                    DATE SAF:
                    <b style="margin-left:1em">{{date('d/m/Y', strtotime($mail->saf_arrived->date_saf))}}</b>
                </div>
                <div class="col-5">
                    OBSERVATION SAF:
                    <b style="margin-left:1em">{{$mail->saf_arrived->observation}}</b>
                </div>
            </div>
            <div class="row border border-primary rounded p-3 mb-3">
                <div class="col-3">
                    N° DIR:
                    <b style="margin-left:1em">{{$mail->dir_arrived->num_dir}}</b>
                </div>
                <div class="col-4">
                    DATE DIR:
                    <b style="margin-left:1em">{{date('d/m/Y', strtotime($mail->dir_arrived->date_dir))}}</b>
                </div>
            </div>
            <div class="row border border-primary rounded p-3 mb-3">
                <div class="col">
                    <form action="{{ route('mails.edit', ['mail' => $mail->id]) }}" method="GET">
                        <button type="submit" class="btn btn-primary btn-sm btn-block mb-2">modifier</button>
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
                
            <div class="row border border-primary rounded p-3 mb-3">
                <div class="col">
                    <form action="{{ route('images.store', ['mail' => $mail->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="form-group col-8">
                                    <label for="myPdfFile">File</label>
                                    <input id="myPdfFile" name="myPdfFile" type="file" class="form-control-file">
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-success btn-sm">ajouter PDF</button>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card p-4">
                <h3>liste des pièces Pdf</h3>
                <ul class="list-group">
                    @forelse ($mail->images as $image)
                <li class="list-item"><a href="{{$image->url()}}"><span class="badge badge-warning"><b>Pièce pdf : {{$loop->iteration}}</b></span> </a></li>
                    @empty
                        <span class="badge badge-danger">aucune pièce</span>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>



@endsection