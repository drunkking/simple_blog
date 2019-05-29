@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">

        <div class="col-md-7">
            <br>
            <h1>Edit Post</h1>
            <br>

            {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}

            <div class="form-group">
                {{Form::label('title','Title')}}
                {{Form::text('title',$post->title,['class' => 'form-control'])}}
            </div>

            <div class="form-group">
                {{Form::label('sub','Subtitle')}}
                {{Form::text('subtitle',$post->subtitle,['class' => 'form-control'])}}
            </div>

            <div class="form-group">
                {{Form::label('curr_img','Current Image')}}
                <br>
                <img src="/storage/post_images/{{$post->image}}" class="img img-fluid" width="350px">
            </div>

            <div class="form-group">
                {{Form::label('img','Image')}}
                {{Form::file('image')}}
            </div>

            <div class="form-group">
                {{Form::label('category','Category')}}
                {{Form::select('category_id',[$post->category_id => $post->category->name] + $categories,null,['class' => 'form-control'])}}
            </div>


            <div class="form-group">
                {{Form::label('r_tag','Remaining Tags')}}
                <br>
                @foreach($tags as $tag)
                    <div class="form-check form-check-inline">
                        <input name="remaining_tags[]" class="form-check-input" type="checkbox" value="{{$tag->id}}">
                        <label class="form-check-label">
                            {{$tag->name}}
                        </label>
                    </div>
                @endforeach

            </div>

            <div class="from-group">
                {{Form::label('u_tag','Used Tags')}}
                <br>
                @foreach($postTags as $tag)
                    <div class="form-check form-check-inline">
                        <input name="used_tags[]" class="form-check-input" type="checkbox" value="{{$tag->id}}">
                        <label class="form-check-label">
                            {{$tag->name}}
                        </label>
                     </div>
                @endforeach
            </div>

            <div class="form-group">
                {{Form::label('content','Content')}}
                {{Form::textarea('content',$post->content,['class' => 'form-control'])}}
            </div>

            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Save', ['class' => 'btn btn-primary'])}}

            {!! Form::close() !!}
        </div>
    </div>

@endsection