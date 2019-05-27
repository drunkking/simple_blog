@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <br>
            <div class="card">
                <div class="card-header">
                    <a href="/home/categories/create" class="btn btn-primary">Create Category</a>
                </div>
                <div class="card-body">

                    @if(count($categories) > 0)
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
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->created_at}}</td>
                                        <td><a href="/home/categories/{{$category->id}}/edit" class="btn btn-success">Edit</a></td>
                                        <td>
                                            {!! Form::open(['action' => ['CategoriesController@destroy', $category->id], 'method' => 'POST']) !!}
                                                {{Form::hidden('_method','DELETE')}}
                                                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    @endforeach

                            </tbody>
                        </table>
                        @else
                        <p>there is no categories</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection