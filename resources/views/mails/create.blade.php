@extends('layouts.app')

@section('content')



<div class="container">
    <h2>un nouveau courrier</h2>
    <x-errors></x-errors>
    
    <form action="{{ route('mails.store') }}" method="POST">
        @csrf
        <div class="form-group row">
            <label for="sender" class="col-1 col-form-label my-2">Expéditeur</label>
            <div class="col-4 my-2">
                <input type="text" class="form-control" name="sender" id="sender" placeholder="expéditeur" value = {{ old('sender')}}>
            </div>
            <label for="subject" class="col-2 col-form-label my-2">Objet de la correspondance</label>
            <div class="col-5 my-2">
                <textarea class="form-control" name="subject" id="subject" placeholder="objet de la correspendance" rows="3" value = {{ old('subject')}}></textarea>
            </div>     
            <label for="saf_num" class="col-1 col-form-label my-2">N° SAF</label>
            <div class="col-2 my-2">
                <input type="text" class="form-control" name="saf_num" id="saf_num" placeholder="n° du saf" value = {{ old('saf_num')}}>
            </div>
            <label for="saf_date" class="col-1 col-form-label my-2">Date SAF</label>
            <div class="col-2 my-2">
                <input type="text" class="form-control" name="saf_date" id="saf_date" placeholder="date du saf" value = {{ old('saf_date')}}>
            </div>
            <label for="bjd_num" class="col-1 col-form-label my-2">N° BJD</label>
            <div class="col-2 my-2">
                <input type="text" class="form-control" name="bjd_num" id="bjd_num" placeholder="n° du bjd" value = {{ old('bjd_num')}}>
            </div>
            <label for="bjd_date" class="col-1 col-form-label my-2">Date BJD</label>
            <div class="col-2 my-2">
                <input type="text" class="form-control" name="bjd_date" id="bjd_date" placeholder="date du BJD" value = {{ old('bjd_date')}}>
            </div>
            <label for="saf_note" class="col-2 col-form-label my-2">Remarque du chef du SAF</label>
            <div class="col-4 my-2">
                <input type="text" class="form-control" name="saf_note" id="saf_note" placeholder="Remarque du chef du SAF" value = {{ old('saf_note')}}>
            </div>
            <div class="col-4 my-2">
                <button type="submit" class="btn btn-primary btn-block">Action</button>
            </div>
        </div>               
        
    </form>
    </div>

@endsection