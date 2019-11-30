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
            $new_role = 'admin';
        }
        else{
            $new_role = 'writer';
        }
        $user->update(['role' => $new_role]);
        $message = "User set as $new_role  successfully.";
        session()->flash('success', $message);
        return redirect()->route('users');
    }
}
