@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <br>
            <div class="card">
                <div class="card-header">
                    <a href="/home/tags/create" class="btn btn-primary">Create Tag</a>
                </div>
                <div class="card-body">

                    @if(count($tags) > 0)
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
                            @foreach($tags as $tag)
                                <tr>
                                    <td>{{$tag->name}}</td>
                                    <td>{{$tag->created_at}}</td>
                                    <td><a href="/home/tags/{{$tag->id}}/edit" class="btn btn-success">Edit</a></td>
                                    <td>
                                        {!! Form::open(['action' => ['TagsController@destroy', $tag->id], 'method' => 'POST']) !!}
                                        {{Form::hidden('_method','DELETE')}}
                                        {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    @else
                        <p>there is no tags</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection