@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">

        <div class="col-md-7">
            <br>
            <h1>Edit Tag</h1>
            <br>

            {!! Form::open(['action' => ['TagsController@update', $tag->id], 'method' => 'POST']) !!}

                <div class="form-group">
                    {{Form::label('name','Name')}}
                    {{Form::text('name',$tag->name,['class' => 'form-control'])}}
                </div>

                {{Form::hidden('_method','PUT')}}
                {{Form::submit('Save', ['class' => 'btn btn-primary'])}}

            {!! Form::close() !!}
        </div>
    </div>

@endsection