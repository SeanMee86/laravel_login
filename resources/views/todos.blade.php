@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    @foreach($todos as $todo)
                    <div class="panel-body">
                        {{$todo->todos}} - @if($todo->is_complete) Completed @else Not Completed @endif <div class="btn btn-info is_complete">Done</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection