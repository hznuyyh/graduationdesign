@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel col-md-8 col-md-offset-0" style="padding: 10px">
            <div class="input-group">
            <i class="glyphicon glyphicon-question-sign"></i>
            <button type="button" class="btn btn-link btn-lg">提问</button>
            <div class="input-group col-md-12 col-lg-offset-12" style="float:right;margin-top: -40px; padding-left: 120px">
                <input type="text" class="form-control" placeholder="搜索你感兴趣的内容">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                </span>
            </div>
            </div>
        </div>
        <div class="panel col-md-8 col-md-offset-0">
            <div class="panel-body">
                <div class="col-lg-offset-1">
                    <i class="glyphicon glyphicon-fire"></i>
                    <span>最新热点</span>
                </div>
                <div class="panel-heading">
                    @if(!empty($explore_data['goods']))
                        <div class=" col-lg-offset-0 col-md-12 ">
                            <div class="media">
                                <div class="media-body">
                                    <div class="media-heading">
                                        <div class="media-left avatar">
                                        @if(\App\Model\Avatar::getInfo($explore_data['goods']->user_id)->url !="")
                                           <img style="width: 45px;height: 45px" src="{{\App\Model\Avatar::getInfo($explore_data['goods']->user_id)->url}}">
                                        @else
                                           <img style="width: 45px;height: 45px" src="/image/avatar/default_avatar.jpeg">
                                            @endif
                                        </div>
                                        <h4 class="user_name media-right media-bottom">{{\App\User::getName($explore_data['goods']->user_id)->name}} &nbsp;</h4>
                                        <small class="user_name media-right media-bottom">{{\App\Model\Avatar::getInfo($explore_data['goods']->user_id)->user_label    }}</small>
                                    </div>
                                    <div class="media-body">
                                        <h4>
                                            <a class="index-link" href="/explore/{{$explore_data['goods']->id}}">{{$explore_data['goods']->title}}</a>
                                        </h4>
                                        <div class="media-object">
                                            @if(strlen($explore_data['goods']->content) > 200 )
                                                {!! substr($explore_data['goods']->content,0,210) .'..' !!}
                                            @else
                                                {!! $explore_data['goods']->content  !!}
                                            @endif
                                        </div>
                                        <div class="media-object media-bottom" style="padding-top: 20px">
                                            <button id='{{$explore_data['goods']->id}}' type="button" value="{{$explore_data['goods']->id}}" class="btn btn-info glyphicon glyphicon-triangle-top" onclick="goodToExplore(this.value,1)">
                                                {{$explore_data['goods']->goods_count}}
                                            </button>
                                            <button type="button" value="{{$explore_data['goods']->id}}" class="btn btn-info glyphicon glyphicon-triangle-bottom" onclick="goodToExplore(this.value,0)"></button>
                                            <i style="padding-left: 80px" class="glyphicon glyphicon-comment">
                                                {{$explore_data['goods']->comments_count}}条评论
                                            </i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @else
                        <div class=" col-lg-offset-0 col-md-12 ">
                            <div class="media">
                                <div class="media-heading">
                                    <h4>
                                        还没有最新热点哦！快去发表吧！
                                        <small class="pagination-sm "><a href="/explore/create">点击这里去发表》》</a></small>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="panel col-md-8 col-md-offset-0">

            <div class="panel-heading">
                <div class="col-lg-offset-1">
                    <i class="glyphicon glyphicon-th-list"></i>
                    <span>热门推荐</span>
                </div>
                @foreach($explore_data['explore'] as $explore)
                <div class="panel">
                    <div class="panel-body">
                        <div class="col-lg-offset-0 col-md-12 ">
                                <div class="media-heading">
                                    <div class="media-left avatar">
                                        @if(\App\Model\Avatar::getInfo($explore["user_id"])['url'])
                                            <img style="width: 45px;height: 45px" src="{{\App\Model\Avatar::getInfo($explore['user_id'])['url']}}">
                                        @else
                                            <img style="width: 45px;height: 45px" src="/image/avatar/default_avatar.jpeg">
                                        @endif
                                    </div>
                                    <h4 class="user_name media-right media-bottom">{{\App\User::getName($explore['user_id'])['name']}} &nbsp;</h4>
                                    <small class="user_name media-right media-bottom">{{\App\Model\Avatar::getInfo($explore['user_id'])['user_label'] }}</small>
                                </div>
                                <div class="media-body">
                                    <h4>
                                        <a class="index-link" href="/explore/{{$explore->id}}">{{$explore->title}}</a>
                                    </h4>
                                    <div class="media-object">
                                        @if(strlen($explore->content) > 200 )
                                            {!! substr($explore->content,0,210) .'..' !!}
                                        @else
                                            {!! $explore->content  !!}
                                        @endif
                                    </div>
                                    <div class="media-object media-bottom" style="padding-top: 20px">
                                        <button id='{{$explore->id}}' type="button" value="{{$explore->id}}" class="btn btn-info glyphicon glyphicon-triangle-top" onclick="goodToExplore(this.value,1)">
                                            {{$explore->goods_count}}
                                        </button>
                                        <button type="button" value="{{$explore->id}}" class="btn btn-info glyphicon glyphicon-triangle-bottom" onclick="goodToExplore(this.value,0)"></button>
                                        <i style="padding-left: 80px" class="glyphicon glyphicon-comment">
                                            {{$explore->comments_count}}条评论
                                        </i>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        function goodToExplore(value,type) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post('/explore/goodToExplore',
                {
                    type      : type,
                    explore_id: value
                },
                function (data,status) {
                    if(data.code === 0) {
                        document.getElementById(value).innerHTML = " " + data.data.goods_count;
                        $('#follow').removeClass('btn-danger').addClass('btn-success').addClass('disabled');
                    }
                },'json')
        }

    </script>
@endsection