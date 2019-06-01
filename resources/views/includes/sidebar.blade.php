<div class="col-lg-3">
    <div class="card">
        <div class="card-header">Categories</div>
        <div class="card-body" style="font-size: 20px">
            @if(count($categories))

                @foreach($categories as $category)

                    <span><a class="badge badge-pill badge-success" href="/categories/{{$category->name}}">{{$category->name}}</a></span>
                @endforeach

                @endif
        </div>
    </div>
    <br><br>
    <div class="card">
        <div class="card-header">Tags</div>
        <div class="card-body" style="font-size: 20px">
         @if(count($tags))

             @foreach($tags as $tag)
                <a href="/tag/{{$tag->name}}" class="badge badge-primary">{{$tag->name}}</a>
                @endforeach
        @endif
        </div>

    </div>
</div>
