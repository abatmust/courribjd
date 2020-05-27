@extends('layouts.app')

@section('content')

<div class="container">
    <div class="p-1 row">

        <x-errors></x-errors>

        <h3 class="col-12">ajouter un nouveau courrier</h3>
        <form action="{{ route('mails.update', ['mail' => $mail->id]) }}" method="POST" class="row">
            @csrf
            @method('PUT')
            <fieldset class="m-1 border border-secondary p-1 rounded col">
                <legend class="border border-secondary text-center rounded">BJD</legend>
                <div class="form-group">
                  <label for="sender">Expéditeur</label>
                  <input type="text" name="sender" id="sender" class="form-control input-sm" placeholder="" value = "{{ old('sender', $mail->sender ?? null) }}">
                </div>
                <div class="form-group">
                    <label for="subject">Objet</label>
                    <textarea name="subject" id="subject" rows="2" class="form-control input-sm" placeholder="">{{ old('subject', $mail->subject ?? null) }}</textarea>
                </div>
                <div class="form-row">

                    <div class="form-group col">
                        <label for="num_bjd">N° BJD</label>
                        <input type="text" name="num_bjd" id="num_bjd" class="form-control input-lg" placeholder="" value = {{ old('num_bjd', $mail->num_bjd ?? null) }}>
                    </div>
                    <div class="form-group col">
                        <label for="date_bjd">Date BJD</label>
                        <input type="date" name="date_bjd" id="date_bjd" class="form-control input-sm" placeholder="" value = {{ old('date_bjd', $mail->date_bjd ?? null) }}>
                        <small id="helpId" class="text-muted">aaaa-mm-jj</small>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label for="section">Section</label>
                    <select class="custom-select" id="section" name="section" value = {{ old('section')}}>
                        @if (old('section') == "divers" || $mail->section == "divers")
                            <option value="divers" selected>Divers</option>
                            <option value="expropriation">Expropriation</option>
                            <option value="domanial">Domanial</option>
                            <option value="contentieux">Contentieux</option>
                        @elseif(old('section') == "expropriation" || $mail->section == "expropriation")
                            <option value="divers">Divers</option>
                            <option value="expropriation" selected>Expropriation</option>
                            <option value="domanial">Domanial</option>
                            <option value="contentieux">Contentieux</option>
                        @elseif(old('section') == "domanial" || $mail->section == "domanial")
                            <option value="divers">Divers</option>
                            <option value="expropriation">Expropriation</option>
                            <option value="domanial" selected>Domanial</option>
                            <option value="contentieux">Contentieux</option>
                        @elseif(old('section') == "contentieux" || $mail->section == "contentieux")
                            <option value="divers">Divers</option>
                            <option value="expropriation">Expropriation</option>
                            <option value="domanial">Domanial</option>
                            <option value="contentieux" selected>Contentieux</option>
                        @else
                            <option value="divers">Divers</option>
                            <option value="expropriation">Expropriation</option>
                            <option value="domanial">Domanial</option>
                            <option value="contentieux">Contentieux</option>
                        @endif
                        
                        
                      </select>
                  </div>
                
            </fieldset>
            <fieldset class="m-1 border border-secondary p-1 rounded col">
                <legend class="border border-secondary text-center rounded">SAF</legend>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="num_saf">N° SAF</label>
                        <input type="text" name="num_saf" id="num_saf" class="form-control input-sm" placeholder="" value = {{ old('num_saf', $mail->saf_arrived->num_saf ?? null) }}>
                    </div>
                    <div class="form-group col">
                        <label for="date_saf">Date SAF</label>
                        <input type="date" name="date_saf" id="date_saf" class="form-control input-sm" placeholder="" value = {{ old('date_saf', $mail->saf_arrived->date_saf ?? null) }}>
                    </div>
                </div>
                <div class="form-group">
                    <label for="observation">Observation</label>
                    <textarea name="observation" id="observation" rows="2" class="form-control input-sm" placeholder="">{{ old('observation', $mail->saf_arrived->observation ?? null) }}</textarea>
                </div>
                
            </fieldset>
            <fieldset class="m-1 border border-secondary p-1 rounded col">
                <legend class="border border-secondary text-center rounded">Direction</legend>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="num_dir">N° Direction</label>
                        <input type="text" name="num_dir" id="num_dir" class="form-control input-sm" placeholder="" value = {{ old('num_dir', $mail->dir_arrived->num_dir ?? null) }}>
                    </div>
                    <div class="form-group col">
                        <label for="date_dir">Date Direction</label>
                        <input type="date" name="date_dir" id="date_dir" class="form-control input-sm" placeholder="" value = {{ old('date_dir', $mail->dir_arrived->date_dir ?? null) }}>
                    </div>
                </div>
            </fieldset>
            <button class="btn btn-primary btn-lg btn-block my-3" type="submit">modifier</button>
        </form>
    </div>







@endsection