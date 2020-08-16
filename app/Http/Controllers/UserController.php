<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;

class UserController extends Controller
{
    //

    public function index(User $user){

        $users= User::all();
        return view('admin.users.index', ['users'=>$users]);
    }

    public function show(User $user){

        return view('admin.users.profile', [
            'user'=>$user,
            'roles'=>Role::all()
        ]);
    }

    public function destroy(User $user){
        $user->delete();

        session()->flash('user-deleted-message','user had been deleted');

        return back();
    }

    public function update(User $user){

        $inputs = request()->validate([
            'username' => ['required', 'string', 'max:255', 'alpha_dash'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'file' => ['file']            
        ]);

        if(request('avatar')){

            $inputs['avatar'] = request('avatar')->store('images');
        }


        $user->update($inputs);

        return back();
        
    }
    public function attach(User $user){

        $user->roles()->attach(request('role'));

        return back();
    }

    public function detach(User $user){

        $user->roles()->detach(request('role'));

        return back();
    }
}
