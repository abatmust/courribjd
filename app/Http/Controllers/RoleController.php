<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Role;

class RoleController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $roles = Role::all();

        return view('roles.index', ['roles' => $roles]);
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'role' => 'required|unique:roles|max:10|alpha'
        ]);
        Role::create($validatedData);
        return back();
    }
}
