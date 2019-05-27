<div class="col-lg-2">
    <div class="card">
        <div class="card-header">Categories</div>
        <div class="card-body" style="font-size: 20px">
            @if(count($categories))

                @foreach($categories as $category)

                    <span><a class="badge badge-pill badge-success" href="">{{$category->name}}</a></span>
                @endforeach

                @endif
        </div>
    </div>
    <br><br>
    <div class="card">
        <div class="card-header">Tags</div>
        <div class="card-body" style="font-size: 20px">
            <a href="#"  style="font-size: 13px" class="badge badge-primary">Slike</a>
            <a href="#" class="badge badge-primary">Primardsadasy</a>
            <a href="#" class="badge badge-primary">Primary</a>
            <a href="#" class="badge badge-primary">Primary</a>
            <a href="#" class="badge badge-primary">Primary</a>
            <a href="#" class="badge badge-primary">Primary</a>
            <a href="#" class="badge badge-primary">Primary</a>

        </div>

    </div>
</div>
