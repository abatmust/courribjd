@extends('layouts.app')

@section('content')
    <h1>la liste des images</h1>
    @foreach ($files as $item)

    <div class="card">red</div>
    <div class="card rounded">
        <embed src="{{Storage::url($item)}}" type="application/pdf" width="100%" height="300%">
    </div>
    
    @endforeach
@endsection