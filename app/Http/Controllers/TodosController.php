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
                'todo' => 'required'
            ]);

            $todo = new Todos;

            $todo->todos = $request->input('todo');
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
    public function show(Todos $todos)
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
    public function update(Request $request, Todos $todos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todos $todos)
    {
        //
    }
}
