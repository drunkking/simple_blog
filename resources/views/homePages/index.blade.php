@extends('layouts.app')


@section('content')

    <div class="row">
        <div class="col-lg-12">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Fluid jumbotron</h1>
                <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
            </div>
        </div>
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-lg-6">
            <h1>Post 1</h1>
        </div>

        <div class="col-lg-2">
            <div class="card">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <ul>
                        <li><a href="">eewrwerwerwerwe</a></li>
                        <li><a href="">eewrwerwerwerwe</a></li>
                        <li><a href="">eewrwerwerwerwe</a></li>
                    </ul>
                </div>
            </div>
            <br><br>
            <div class="card">
                <div class="card-header">Tags</div>
                <div class="card-body">
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

    </div>



    @endsection