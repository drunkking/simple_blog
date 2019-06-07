@extends('layouts.app')


@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">

                <h1 class="text-center">Contact Me</h1>
                {!! Form::open(['action' => 'HomePagesController@storeMessage', 'method' => 'POST']) !!}

                    <div class="form-group">
                        {{Form::label('email','Email')}}
                        {{Form::email('email','',['class' => 'form-control'])}}
                    </div>

                    <div class="form-group">
                        {{Form::label('msg','Message')}}
                        {{Form::textarea('message','',['class' => 'form-control'])}}
                    </div>


                {{Form::submit('Send',['class' => 'btn btn-primary'])}}
                {!! Form::close(); !!}
            </div>
        </div>
    </div>



@endsection