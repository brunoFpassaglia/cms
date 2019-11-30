<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function index(){
                //
        $users = User::all();
        return view('users.index')->with('users', $users);
    }

    /**
     * @param int $id
     */
    public function makeAdmin($id){
        $user = User::find($id);
        if(!$user->isAdmin()){
            $updated = $user->update(['role'=> 'admin']);
            if($updated){
                session()->flash('success','User set as admin successfully.');
                return redirect()->route('users');
            }
        }
        else{
            $updated = $user->update(['role'=> 'writer']);
            if($updated){
                session()->flash('success','User set as writer successfully.');
                return redirect()->route('users');
            }
        }
    }
}
