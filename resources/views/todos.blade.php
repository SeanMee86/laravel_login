@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <div class="panel-body">
                    @foreach($todos as $todo)
                        <div class="todo">
                            {{$todo->todos}} @if($todo->is_complete) - <strong>Completed</strong>
                        <div class="buttons">
                            {!! Form::open(['url' => '/todos/add/', 'method' => 'put', 'style' => 'display: inline;']) !!}
                            {!! Form::hidden('is_complete', '0') !!}
                            {!! Form::hidden('todo_id', $todo->id) !!}
                            {!! Form::submit('Re-Open', ['class' => 'btn btn-warning']) !!}
                            {!! Form::close() !!}

                            {!! Form::open(['url' => '/todos/add/', 'method' => 'delete', 'style' => 'display: inline;']) !!}
                            {!! Form::hidden('todo_id', $todo->id) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>

                            @else <span class="due_by">*Due by {{date('m-d-Y', strtotime($todo->deadline))}}*</span> - <strong>Not Completed</strong>
                        <div class="buttons">
                            {!! Form::open(['url' => '/todos/add/', 'method' => 'put', 'style' => 'display: inline;']) !!}
                            {!! Form::hidden('is_complete', '1') !!}
                            {!! Form::hidden('todo_id', $todo->id) !!}
                            {!! Form::submit('Complete', ['class' => 'btn btn-success']) !!}
                            {!! Form::close() !!}
                        </div>

                            @endif
                            @if (!$loop->last)
                            <hr>
                            @endif
                        </div>
                    @endforeach
                    <a href="/todos/add"><button class="btn btn-primary add-todo">Add Todo</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

