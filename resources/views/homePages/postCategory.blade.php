@extends('layouts.app')


@section('content')

    @include('includes.jumbo')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                @if(count($posts) > 0)
                    @foreach($posts as $post)
                        <article>
                            <header>
                                <h1><a href="{{url('/blog/'. $post->date.'/'.preg_replace('/[\s_]/','-',$post->title))}}">{{$post->title}}</a></h1>
                            </header>
                            <h4>
                                {{$post->subtitle}}
                                <a href="/categories/{{$post->category->name}}" class="badge badge-success">{{$post->category->name}}</a>
                            </h4>
                            {{ substr($post->content,0,400).'...'}}
                            <br><br>
                        </article>
                        <p>{{$post->created_at->diffForHumans()}} </p>
                        @foreach($post->tags as $tag)
                            <a style="font-size:14px" href="/tag/{{$tag->name}}" class="badge badge-primary">{{$tag->name}}</a>
                        @endforeach
                        <hr>
                    @endforeach
                @else
                    <h2>There is no posts with this category</h2>
                @endif
            </div>

            @include('includes.sidebar')
        </div>

    </div>



@endsection