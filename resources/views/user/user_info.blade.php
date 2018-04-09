@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel col-md-4" id="list">
            <div class="panel-heading col-md-12">
                <div class="panel-body">
                    我的私信列表
                </div>
                <div class="panel-body col-md-12 list-group pre-scrollable">
                    @foreach($message_data as $key => $value)
                        <div class="media-heading list-group-item" onclick="changeMessageUser({{$key}})">
                            <div class="media-left avatar">
                                @if(\App\Model\Avatar::getInfo($key)['url'])
                                    <img style="width: 55px;height: 55px" src="{{\App\Model\Avatar::getInfo($key)['url']}}">
                                @else
                                    <img style="width: 55px;height: 55px" src="/image/avatar/default_avatar.jpeg">
                                @endif
                            </div>
                            <div class="user_name media-right media-middle">
                                <h5>{{\App\User::getName($key)['name']}}</h5>
                                <small class="media-left media-bottom">{{$value[0][0]->message}}</small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="message-window panel col-md-6 col-md-offset-1 hidden">
        </div>
        @foreach($message_data as $key => $value )
        <div class="panel col-md-6 col-md-offset-1 hidden messages" id="{{$key.'-message'}}">
            <div class="panel-heading ">
                {{--名字--}}
                <div class="media-right media-middle">
                    <h5 id="message_targer_name">
                        {{\App\User::getName($key)['name']}}
                    </h5>
                </div>
                {{--分割线--}}
                <hr class="split-line" width="100%" style="margin-top: 0px">
                <div class="panel-body">
                    @foreach($value as $value_item)
                        @foreach($value_item as $v)
                        <div class="panel-body">
                            @if($v->to_user_id == \Illuminate\Support\Facades\Auth::id())
                                <div class="media pull-left">
                                    @if(\App\Model\Avatar::getInfo($v->from_user_id)['url'])
                                        <img style="width: 35px;height: 35px" src="{{\App\Model\Avatar::getInfo($v->from_user_id)['url']}}">
                                    @else
                                        <img style="width: 35px;height: 35px" src="/image/avatar/default_avatar.jpeg">
                                    @endif
                                </div>
                                <div class="media-right col-md-6 media-bottom">
                                    <p class="media-bottom">
                                        {{$v->message}}
                                    </p>
                                </div>
                            @else
                                <div class="media pull-right">
                                    <div class="pull-left media-bottom">
                                        <p class="pull-right media-middle media-left col-md-offset-0" >
                                            {{$v->message}}
                                        </p>
                                    </div>
                                    @if(\App\Model\Avatar::getInfo($v->from_user_id))
                                        <img class="media-middle" style="width: 35px;height: 35px" src="{{\App\Model\Avatar::getInfo($v->from_user_id)['url']}}">
                                    @else
                                        <img class="media-middle" style="width: 35px;height: 35px" src="/image/avatar/default_avatar.jpeg">
                                    @endif
                                </div>
                                @endif
                        </div>
                            @endforeach
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
        {{--<div class="panel col-md-6 col-md-offset-1" id="default-message">--}}
            {{--<div class="panel-heading">--}}
                {{--<div class="media-heading ">--}}
                    {{--<div class="media-right media-middle">--}}
                        {{--<h5 id="message_targer_name">{{\App\User::getName($key)['name']}}</h5>--}}
                    {{--</div>--}}
                    {{--<hr class="split-line" width="100%" style="margin-top: 0px">--}}
                    {{--<div class="panel-body">--}}
                        {{--@foreach($default_message as $default)--}}
                            {{--<div class="panel-body">--}}
                                {{--@if($default->to_user_id == \Illuminate\Support\Facades\Auth::id())--}}
                                    {{--<div class="media pull-left">--}}
                                        {{--@if(\App\Model\Avatar::getInfo($default->from_user_id)['url'])--}}
                                            {{--<img style="width: 35px;height: 35px" src="{{\App\Model\Avatar::getInfo($default->from_user_id)['url']}}">--}}
                                        {{--@else--}}
                                            {{--<img style="width: 35px;height: 35px" src="/image/avatar/default_avatar.jpeg">--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                    {{--<div class="media-right col-md-6 media-bottom">--}}
                                        {{--<p class="media-bottom">--}}
                                            {{--{{$default->message}}--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                {{--@else--}}
                                    {{--<div class="media pull-right">--}}
                                        {{--<div class="pull-left media-bottom">--}}
                                            {{--<p class="pull-right media-middle media-left col-md-offset-0" >--}}
                                                {{--{{$default->message}}--}}
                                            {{--</p>--}}
                                        {{--</div>--}}
                                        {{--@if(\App\Model\Avatar::getInfo($default->from_user_id))--}}
                                            {{--<img class="media-middle" style="width: 35px;height: 35px" src="{{\App\Model\Avatar::getInfo($default->from_user_id)['url']}}">--}}
                                        {{--@else--}}
                                            {{--<img class="media-middle" style="width: 35px;height: 35px" src="/image/avatar/default_avatar.jpeg">--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--@endforeach--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
    <script>
        function changeMessageUser(key) {
            var id =  "#" + key + "-message";
            $('.messages').addClass("hidden").removeClass('show')
            $(id).addClass("show").removeClass('hidden')
        }
    </script>
@endsection