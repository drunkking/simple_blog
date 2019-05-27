@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <br>
            <div class="card">
                <div class="card-header">
                    <a href="/home/posts/create" class="btn btn-primary">Create Post</a>
                </div>
                <div class="card-body">

                    @if(count($posts) > 0)
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Created at</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->created_at}}</td>
                                    <td><a href="/home/posts/{{$post->id}}/edit" class="btn btn-success">Edit</a></td>
                                    <td>
                                        {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST']) !!}
                                        {{Form::hidden('_method','DELETE')}}
                                        {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            {{$posts->links()}}
                        </table>
                    @else
                        <p>there is no posts</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection