@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open(['url' => 'todos/add']) !!}
                <div class="form-group">
                    {!! Form::label('todo', 'New Todo') !!}
                    {!! Form::text('todo', '', ['class' => 'form-control', 'placeholder' => 'New Todo']) !!}
                    <br>
                    {!! Form::date('deadline', '', ['class' => 'form-control date-input']) !!}
                </div>
                <div>
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary col-lg-3']) !!}
                    <a href="/todos"><button class="btn btn-danger col-lg-offset-1 col-lg-3" type="button">Cancel</button></a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection