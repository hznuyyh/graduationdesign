@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="media">
            <div class=" panel-heading">
                <h4>视频列表</h4>
                <hr class="split-line">
            </div>
                @foreach($data as $item)
                    <div class="col-lg-3" >
                        <div class="text-center">
                            <h4 class="center-align">{{$item->name}}</h4>
                        </div>
                        <div class="ellipsis">
                            <span>{{$item->content}}</span>
                        </div>
                        <div class="panel">
                        <div class="embed-responsive embed-responsive-16by9 panel-body">
                            <div class="panel-body">
                                {!! $item->url!!}
                             </div>
                        </div>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>
    <div class="text-center">
        {{$data->links()}}
    </div>
@endsection