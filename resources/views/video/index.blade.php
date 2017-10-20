@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel">
            <div class=" panel-heading">
                 我的视频
            </div>
            <div class="panel-body">
                @foreach($data as $item)
                    <div class="media">
                        <div class="media-heading">
                            {{$item->name}}
                        </div>
                        <div class="media-object">
                            {{$item->content}}
                        </div>
                        <div class="media-body">
                            {!! $item->url !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection