@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel">
            <div class="panel-body">
                <div class="col-lg-offset-1">
                    <i class="glyphicon glyphicon-fire"></i>
                    <span>最新热点</span>
                </div>
                <div class=" col-lg-offset-1 col-sm-6">
                    <hr class="split-line">
                </div>
                <div class="panel-heading">
                    @if(!empty($explore_data['goods']))
                        <div class=" col-lg-offset-1 col-md-6 ">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        {{$explore_data['goods']->title}}
                                    </h4>
                                    <p class="media-object">
                                        {{$explore_data['goods']->content}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class=" col-lg-offset-1 col-md-6 ">
                            <div class="media">
                                <div class="media-heading">
                                    <h4>
                                        还没有最新热点哦！快去发表吧！
                                        <small class="pagination-sm "><a href="">点击这里去发表》》</a></small>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="panel-heading">
                <div class="col-lg-offset-1">
                    <i class="glyphicon glyphicon-th-list"></i>
                    <span>热门推荐</span>
                </div>
                <div class=" col-lg-offset-1 col-sm-6">
                    <hr class="split-line">
                </div>
                <div class="panel-body">
                    <div class=" col-lg-offset-1 col-md-6 ">
                        @foreach($explore_data['explore'] as $explore)
                            <div class="media">
                                <div class="media-heading">
                                    <h4 class="media-heading">
                                        <a class="index-link" href="/explore/{{$explore->id}}">{{$explore->title}}</a>
                                    </h4>
                                    <p class="media-body">
                                        {{$explore->content}}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection