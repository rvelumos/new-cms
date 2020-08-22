<?php

namespace App\Http\Controllers;


use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //

    public function index(){

        return view('admin.roles.index',[

            'roles'=>Role::all()
        ]);
    }

    public function store(){

        request()->validate([
            'name'=> ['required']
        ]);
        
        Role::create([
            'name' => request('name'),
            'slug' => strtolower(request('name'))

        ]);
        return back();
    }
}
