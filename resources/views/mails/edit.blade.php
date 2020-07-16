@extends('layouts.app')

@section('content')

<div class="container">
    <div class="p-1">

        <x-errors></x-errors>

        <h3 class="col-12">modifier courrier</h3>
        <form action="{{ route('mails.update', ['mail' => $mail->id]) }}" method="POST" class="row">
            @csrf
            @method('PUT')
            <fieldset class="m-1 border border-secondary p-1 rounded col-5">
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
                            <option value="decisions-notes">Décisions et notes</option>
                        @elseif(old('section') == "expropriation" || $mail->section == "expropriation")
                            <option value="divers">Divers</option>
                            <option value="expropriation" selected>Expropriation</option>
                            <option value="domanial">Domanial</option>
                            <option value="contentieux">Contentieux</option>
                            <option value="decisions-notes">Décisions et notes</option>
                        @elseif(old('section') == "domanial" || $mail->section == "domanial")
                            <option value="divers">Divers</option>
                            <option value="expropriation">Expropriation</option>
                            <option value="domanial" selected>Domanial</option>
                            <option value="contentieux">Contentieux</option>
                            <option value="decisions-notes">Décisions et notes</option>
                        @elseif(old('section') == "contentieux" || $mail->section == "contentieux")
                            <option value="divers">Divers</option>
                            <option value="expropriation">Expropriation</option>
                            <option value="domanial">Domanial</option>
                            <option value="contentieux" selected>Contentieux</option>
                            <option value="decisions-notes">Décisions et notes</option>
                        @elseif(old('section') == "decisions-notes" || $mail->section == "decisions-notes")
                              <option value="divers">Divers</option>
                            <option value="expropriation">Expropriation</option>
                            <option value="domanial">Domanial</option>
                            <option value="contentieux">Contentieux</option>
                            <option value="decisions-notes" selected>Décisions et notes</option>
                        @else
                            <option value="divers">Divers</option>
                            <option value="expropriation">Expropriation</option>
                            <option value="domanial">Domanial</option>
                            <option value="contentieux">Contentieux</option>
                            <option value="decisions-notes">Décisions et notes</option>
                        @endif
                      
                        
                      </select>
                  </div>
                
            </fieldset>
            <fieldset class="m-1 border border-secondary p-1 rounded col-5">
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
            <div class="col-10 row">

                <button class="btn btn-primary btn-lg btn-block my-3 mx-auto col-10" type="submit">modifier</button>
            </div>
        </form>
    </div>







@endsection