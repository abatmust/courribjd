@extends('layouts.app')

@section('content')
.<div class="container">
    <div class="row">
        <div class="col-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>SENDER</th>
                        <th>SUBJECT</th>
                        <th>AFFECTED TO</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mails as $mail)
                    <tr>
                        <td scope="row">{{ $mail->id }}</td>
                        <td>{{ $mail->sender }}</td>
                        <td>{{ $mail->subject }}</td>
                        <td>
                            @forelse ($mail->users as $user)
                                <span class="badge badge-info">{{$user->name}}</span>
                            @empty
                            <span class="badge badge-warning">not yet affected</span>
                            @endforelse
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
        <div class="col-4">
            <div class="border border-info p-1 rounded">

                <x-errors></x-errors>

                <h3>ajouter un nouveau courrier</h3>
                <form action="{{ route('mails.store') }}" method="POST">
                    @csrf
                    <fieldset class="m-1 border border-secondary p-1 rounded">
                        <legend class="border border-secondary text-center rounded">BJD</legend>
                        <div class="form-group">
                          <label for="sender">Expéditeur</label>
                          <input type="text" name="sender" id="sender" class="form-control input-sm" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="subject">Objet</label>
                            <textarea name="subject" id="subject" rows="2" class="form-control input-sm" placeholder=""></textarea>
                        </div>
                        <div class="form-row">

                            <div class="form-group col">
                                <label for="num_bjd">N° BJD</label>
                                <input type="text" name="num_bjd" id="num_bjd" class="form-control input-lg" placeholder="">
                            </div>
                            <div class="form-group col">
                                <label for="date_bjd">Date BJD</label>
                                <input type="date" name="date_bjd" id="date_bjd" class="form-control input-sm" placeholder="">
                                <small id="helpId" class="text-muted">aaaa-mm-jj</small>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label for="section">Section</label>
                            <select class="custom-select" id="section" name="section">
                                <option selected>choix...</option>
                                <option value="divers">Divers</option>
                                <option value="expropriation">Expropriation</option>
                                <option value="domanial">Domanial</option>
                                <option value="contentieux">Contentieux</option>
                              </select>
                          </div>
                        
                    </fieldset>
                    <fieldset class="m-1 border border-secondary p-1 rounded">
                        <legend class="border border-secondary text-center rounded">SAF</legend>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="">N° SAF</label>
                                <input type="text" name="" id="" class="form-control input-sm" placeholder="">
                            </div>
                            <div class="form-group col">
                                <label for="">Date SAF</label>
                                <input type="text" name="" id="" class="form-control input-sm" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Observation</label>
                            <textarea name="" id="" rows="2" class="form-control input-sm" placeholder=""></textarea>
                        </div>
                        
                    </fieldset>
                    <fieldset class="m-1 border border-secondary p-1 rounded">
                        <legend class="border border-secondary text-center rounded">Direction</legend>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="">N° Direction</label>
                                <input type="text" name="" id="" class="form-control input-sm" placeholder="">
                            </div>
                            <div class="form-group col">
                                <label for="">Date Direction</label>
                                <input type="text" name="" id="" class="form-control input-sm" placeholder="">
                            </div>
                        </div>
                    </fieldset>
                    <button class="btn btn-primary btn-lg btn-block my-3" type="submit">ajouter</button>
                </form>
            </div>

        </div>
    </div>
    
    
</div>
    
@endsection