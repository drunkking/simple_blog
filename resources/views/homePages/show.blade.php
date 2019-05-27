@extends('layouts.app')


@section('content')

  @include('includes.jumbo')
  <div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-9 pt-5">
      @if($post)
        @foreach($post as $post_elem)
          <h1>{{$post_elem->title}}</h1>
          <hr>
           <h5>{{$post_elem->date}}</h5>
          <br>
          <img src="/storage/post_images/{{$post_elem->image}}" class="img img-fluid text-center">
          <hr>
          <h2 class="text-center">{{$post_elem->subtitle}}</h2>
          <br>
          <p>{{$post_elem->content}}</p>

          @endforeach
          @else
          <p>No </p>
        @endif
    </div>

    @include('includes.sidebar')
  </div>



  </div>

    @endsection
