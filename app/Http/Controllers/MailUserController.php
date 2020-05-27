<?php

namespace App\Http\Controllers;

use App\models\Mail;
use Illuminate\Http\Request;

class MailUserController extends Controller
{
    public function store(Request $request){
        $mail = Mail::findOrFail($request->input('mail'));
        $mail->users()->toggle([$request->input('assignto')]);
        return redirect()->back();
    }
}
