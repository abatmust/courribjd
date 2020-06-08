<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
   public function store(Request $request){
        $user = User::findOrFail($request->input('user'));
        $this->authorize('is_admin');
        $user->roles()->toggle([$request->input('roleas')]);
        return redirect()->back();
    }
}
