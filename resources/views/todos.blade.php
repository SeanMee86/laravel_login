@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <div class="panel-body">
                    @foreach($todos as $todo)
                        <div class="todo" style="margin: 20px;">
                            {{$todo->todos}} - @if($todo->is_complete) Completed <button
                                                                                    class="btn btn-danger delete"
                                                                                    style="float: right;" todo_id="{{$todo->id}}">
                                                                                        Delete
                                                                                </button>

                                                                                <button
                                                                                    class="btn btn-warning reopen"
                                                                                    style="float: right; margin-right: 20px;" todo_id="{{$todo->id}}">
                                                                                        ReOpen
                                                                                </button>

                            @else Not Completed <button
                                                    class="btn btn-success complete"
                                                    style="float: right;" todo_id="{{$todo->id}}">
                                                        Complete
                                                </button>
                            @endif
                        </div>
                    @endforeach
                    <a href="/todos/add"><button class="btn btn-primary" style="margin: 20px;">Add Todo</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection