@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">

        <div class="col-md-7">
            <br>
            <h1>Create Tag</h1>
            <br>

            {!! Form::open(['action' => 'TagsController@store', 'method' => 'POST']) !!}

            <div class="form-group">
                {{Form::label('name','Name')}}
                {{Form::text('name','',['class' => 'form-control'])}}
            </div>

            {{Form::submit('Create', ['class' => 'btn btn-primary'])}}

            {!! Form::close() !!}
        </div>
    </div>

@endsection