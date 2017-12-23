<?php

namespace App\Http\Controllers;

use App\Todos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(isset(Auth::user()->id)){
            $this->validate($request, [
                'todo' => 'required',
                'deadline' => 'required'
            ]);

            $todo = new Todos;

            $todo->todos = $request->input('todo');
            $todo->deadline = $request->input('deadline');
            $todo->is_complete = false;
            $todo->user_id = Auth::user()->id;

            $todo->save();

            return redirect('/todos');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        if(isset(Auth::user()->id)) {
            $todos = Todos::all()->where('user_id', '=', Auth::user()->id);
            return view('todos')->with('todos', $todos);
        }

        return redirect('login');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function edit(Todos $todos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if(isset (Auth::user()->id)){

            $todo_id = $request->input('todo_id');
            $is_complete = $request->input('is_complete');

            $todo = Todos::findOrFail($todo_id);
            $current_user = $todo->user_id;

            if($current_user !== Auth::user()->id){
                return view('denied');
            }

            $todo->is_complete = $is_complete;
            $todo->save();

            return redirect('/todos');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(isset (Auth::user()->id)){

            $todo = Todos::findOrFail($request->input('todo_id'));
            $current_user = $todo->user_id;
            if($current_user !== Auth::user()->id){
                return view('denied');
            }
            $todo->delete();

            return redirect('/todos');
        }
    }
}
