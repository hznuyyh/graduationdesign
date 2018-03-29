@extends('layouts.app')

@section('content')
    <div class="panel panel-body">
        <div class="panel-heading">
            <h3 class="col-md-7 col-lg-offset-1" style="color: black">{{$data->title}}</h3>
            <h5 class="col-md-7 col-lg-offset-1">楼主：{{\App\User::getName($data->user_id)->name}} &nbsp;</h5>
            <div class="col-lg-offset-0 col-md-3 text-center" style="margin-top: -40px">
                <div class="text-center">关注者
                    <div style="float: right">
                        被浏览
                    </div>
                </div>
                <h4 class="text-center">120
                    <span style="float: right">
                        280
                    </span>
                </h4>
            </div>
        </div>
        <div class="panel-body col-lg-7 col-lg-offset-1">
            <p> {!! $data->content !!} </p>
        </div>
        @if($data->user_id != \Illuminate\Support\Facades\Auth::id())
        <div class="panel-collapse col-lg-7 col-lg-offset-1">
            <button class="btn btn-primary">关注问题</button>
            <button class="btn btn-default col-lg-offset-0 glyphicon glyphicon-pencil">写回答</button>
            <span class='col-lg-offset-1 glyphicon glyphicon-comment'> {{$data->comments_count}}条评论</span>
        </div>
        @endif
    </div>
    <div class="container">

    </div>
@endsection