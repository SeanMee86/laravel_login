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
                            {{$todo->todos}} - @if($todo->is_complete) Completed

                            {!! Form::open(['url' => '/todos/add/', 'method' => 'put', 'style' => 'display: inline;']) !!}
                            {!! Form::hidden('is_complete', '0') !!}
                            {!! Form::hidden('todo_id', $todo->id) !!}
                            {!! Form::submit('Re-Open', ['class' => 'btn btn-warning']) !!}
                            {!! Form::close() !!}

                            {!! Form::open(['url' => '/todos/add/', 'method' => 'delete', 'style' => 'display: inline;']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}

                            @else Not Completed

                            {!! Form::open(['url' => '/todos/add/', 'method' => 'put', 'style' => 'display: inline;']) !!}
                            {!! Form::hidden('is_complete', '1') !!}
                            {!! Form::hidden('todo_id', $todo->id) !!}
                            {!! Form::submit('Complete', ['class' => 'btn btn-success']) !!}
                            {!! Form::close() !!}

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