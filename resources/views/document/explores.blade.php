@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-lg-offset-1">
            <i class="glyphicon glyphicon-th-list"></i>
            <span>最新热点</span>
        </div>
        <div class=" col-lg-offset-1 col-sm-6">
            <hr class="split-line">
        </div>
    </div>
    <div class="container">
            <div class=" col-lg-offset-1 col-md-6 ">
                @foreach($explore_data as $explore)
                    <div class="media">
                        <div class="media-body">
                            <h4 class="media-heading">
                                {{$explore->title}}
                            </h4>
                            <p class="media-object">
                                {{$explore->content}}
                            </p>
                        </div>
                    </div>
                    @endforeach
            </div>
    </div>
@endsection