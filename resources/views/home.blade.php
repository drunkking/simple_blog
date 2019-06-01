@extends('layouts.admin')

@section('content')
<div class="container">
    <br>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   @include('includes.cards')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
