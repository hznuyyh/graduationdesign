@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="col-md-6 col-lg-offset-1">
                <div class="panel">
                    <div class="media">
                    <div class="panel-heading">
                        <h2>{{$data->title}}</h2>
                    </div>
                    <div class="panel-body">
                        <h5>{{$data->content}}</h5>
                    </div>
                    </div>
                </div>
            </div>
    </div>
@endsection