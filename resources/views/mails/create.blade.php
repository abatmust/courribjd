@extends('layouts.app')

@section('content')



<div class="container">
    <h2>un nouveau courrier</h2>
<form action="{{ route('mails.store') }}" method="POST">
    @csrf
        <div class="form-group row">
            <label for="sender" class="col-1 col-form-label">sender</label>
            <div class="col-5">
                <input type="text" class="form-control" name="sender" id="sender" placeholder="sender">
            </div>
            <label for="subject" class="col-1 col-form-label">subject</label>
            <div class="col-5">
                <textarea class="form-control" name="subject" id="subject" placeholder="subject" rows="3"></textarea>
            </div>     
        </div>               
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary btn-sm">Action</button>
            </div>
        </div>
    </form>
    </div>

@endsection