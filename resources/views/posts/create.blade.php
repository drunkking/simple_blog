@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">

        <div class="col-md-7">
            <br>
            <h1>Create Post</h1>
            <br>

            {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}

            <div class="form-group">
                {{Form::label('title','Title')}}
                {{Form::text('title','',['class' => 'form-control'])}}
            </div>

            <div class="form-group">
                {{Form::label('sub','Subtitle')}}
                {{Form::text('subtitle','',['class' => 'form-control'])}}
            </div>

            <div class="form-group">
                {{Form::label('img','Image')}}
                {{Form::file('image')}}
            </div>

            <div class="form-group">
                {{Form::label('category','Category')}}
                {{Form::select('category_id',['' => 'Chose category'] + $categories,null,['class' => 'form-control'])}}
            </div>

            <div class="form-group">
                {{Form::label('content','Content')}}
                {{Form::textarea('content','',['class' => 'form-control'])}}
            </div>

            {{Form::submit('Create', ['class' => 'btn btn-primary'])}}

            {!! Form::close() !!}
        </div>
    </div>

@endsection