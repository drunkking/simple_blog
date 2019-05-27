@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">

        <div class="col-md-7">
            <br>
            <h1>Edit Category</h1>
            <br>

            {!! Form::open(['action' => ['CategoriesController@update', $category->id], 'method' => 'POST']) !!}

                <div class="form-group">
                    {{Form::label('name','Name')}}
                    {{Form::text('name',$category->name,['class' => 'form-control'])}}
                </div>

                {{Form::hidden('_method','PUT')}}
                {{Form::submit('Save', ['class' => 'btn btn-primary'])}}

            {!! Form::close() !!}
        </div>
    </div>

@endsection