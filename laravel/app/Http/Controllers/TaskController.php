<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function create(){
        return view('task.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        Task::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'status' => '未完了',
            'user_id' => Auth::user()->id
        ]);

        return redirect() -> route('user.home');
    }

    public function edit($id){
        $task = Task::find($id);
        return view('task.edit',compact('task'));
    }

    public function delete(Request $request){
        $task = Task::find($request['id']);
        $task->delete();
        return redirect()->route('user.home');
    }

    public function done(Request $request){
        $task = Task::find($request['id']);
        $task->status= '完了';
        $task->save();
        return redirect()->route('user.home');
    }

    public function alreadyDone(){
        $id = Auth::user()->id;
        $tasks = Task::where([['status','=','完了'],['user_id','=',$id]])->get();
        return view('task.alreadtDone',compact('tasks'));
    }

    public function reset(Request $request){
        $task = Task::find($request['id']);
        $task->status = '未完了';
        $task->save();
        return redirect()->route('user.home');
    }

    public function editStore(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $task = Task::find($request['id']);
        $task->title = $request['title'];
        $task->description = $request['description'];
        $task->save();

        return redirect()->route('user.home');

    }
}
