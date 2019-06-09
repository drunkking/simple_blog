@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <br>
            <div class="card">
                <div class="card-header">
                    <h3>Sent by: {{$contact_message->email}}</h3>
                    <h5>{{$contact_message->created_at}}</h5>
                </div>
                <div class="card-body">
                    <p>{{$contact_message->content}}</p>
                </div>
            </div>

            <!-- add reply message next -->
        </div>
    </div>
    @endsection