<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMailRequest;
use App\models\Dir_arrived;
use App\models\Mail;
use App\models\Saf_arrived;
use App\User;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mails = Mail::with(['users', 'saf_arrived'])->latest()->get();
        $users = User::select('id', 'name')->get();


        
        return view('mails.index', ['mails' => $mails, 'users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMailRequest $request)
    {
        $mail = Mail::create($request->only(['sender','subject', 'num_bjd', 'date_bjd', 'section']));
        $saf_arrived = new Saf_arrived($request->only(['num_saf', 'date_saf', 'observation']));
        if($mail && (!empty($request->input('num_saf')) || !empty($request->input('date_saf')) || !empty($request->input('observation')))){
            $mail->saf_arrived()->save($saf_arrived);
        }
        $dir_arrived = new Dir_arrived($request->only(['num_dir', 'date_dir']));
        if($mail && (!empty($request->input('num_dir')) || !empty($request->input('date_dir')))){
            $mail->dir_arrived()->save($dir_arrived);
        }

        return redirect(route('mails.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mail $mail)
    {
        return view('mails.edit', ['mail' => $mail]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $mail = Mail::findOrFail($id);
        $mailUpdated = $mail->update($request->only(['sender','subject', 'num_bjd', 'date_bjd', 'section']));
        if($mail && $mail->saf_arrived)
        {
            $mail->saf_arrived->update($request->only(['num_saf', 'date_saf', 'observation']));
        }
        elseif($mail && (!empty($request->input('num_saf')) || !empty($request->input('date_saf')) || !empty($request->input('observation')))){
            $saf_arrived = new Saf_arrived($request->only(['num_saf', 'date_saf', 'observation']));
            $mail->saf_arrived()->save($saf_arrived);
        }

        if($mail && $mail->dir_arrived)
        {
            $mail->dir_arrived()->update($request->only(['num_dir', 'date_dir']));
        }
        elseif($mail && (!empty($request->input('num_dir')) || !empty($request->input('date_dir')))){
           
            $dir_arrived = new Dir_arrived($request->only(['num_dir', 'date_dir']));
            $mail->dir_arrived()->save($dir_arrived);
        }

        return redirect(route('mails.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
