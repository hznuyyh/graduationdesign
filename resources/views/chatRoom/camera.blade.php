@extends('layouts.app')
    @section('content')
        <div class="container">
            <div class="panel">
                <div class="panel-heading text-center" >
                    开始我的直播
                </div>
                <div class="text-center">
                    <iframe src="/camera.html" width="800px" height="600px">
                    </iframe>
                </div>
            </div>
        </div>
    @endsection
