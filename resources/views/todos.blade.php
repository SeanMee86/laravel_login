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
                            {{$todo->todos}} - @if($todo->is_complete) Completed <button class="btn btn-danger is_complete" style="float: right;">Delete</button><button class="btn btn-warning is_complete" style="float: right; margin-right: 20px;">ReOpen</button>
                            @else Not Completed <button class="btn btn-success is_complete" style="float: right;">Complete</button> @endif
                        </div>
                    @endforeach
                    <a href="/todos/add"><button class="btn btn-primary" style="margin: 20px;">Add Todo</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection