<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create(){
        return view('user.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password'=> 'required'
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ]);

        return redirect() -> route('user.home');
    }
    public function home(){
        $id = Auth::user()->id;
        $tasks = Task::where([['status','=','未完了'],['user_id','=',$id]])->get();
        $name = Auth::user()->name;
        return view('user.home',compact('tasks','name'));
    }
}
