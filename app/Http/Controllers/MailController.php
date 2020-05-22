<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMailRequest;
use App\models\Mail;
use App\models\Saf_arrived;
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
        $mails = Mail::with(['users', 'saf_arrived'])->get();
        //dd($mails);
        return view('mails.index', ['mails' => $mails]);
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
    public function edit($id)
    {
        //
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
        //
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
