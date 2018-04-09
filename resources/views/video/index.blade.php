@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel">
            <div class="panel-heading">
                <h4>课程详情</h4>
            </div>
            <div class="panel-body">
                <div class="col-md-3">
                    <img src="{{$class_info_data->class_img_src}}">
                </div>
                <div class="col-md-3 col-lg-offset-2">
                    <h3>{{$class_info_data->class_name}}</h3>
                </div>
                <div class="col-md-3 col-lg-offset-2">
                    <h5 class="glyphicon glyphicon-user">
                        ({{$count}}) &nbsp;
                        讲师：{{$class_info_data->class_teacher_name}}
                    </h5>
                </div>
                <div class="col-md-6 col-lg-offset-2">
                    <p>
                        {{$class_info_data->class_description}}
                    </p>
                </div>
                <div class="col-md-3 col-lg-offset-2" style="padding-bottom:auto">
                    @if($class_progress == 0)
                    <button type="button" class="btn btn-danger btn-block" aria-label="Left Align" id="follow" value="{{$class_info_data->id}}" onclick="classFollow(this.value)">
                        <span class="glyphicon glyphicon-star" aria-hidden="true">点击参与</span>
                    </button>
                    @elseif($class_progress == 1)
                    <button type="button" class="btn btn-success btn-block" aria-label="Left Align" id="continue" value=2 onclick="classFollow(this.value)">
                        <span class="glyphicon glyphicon-star" aria-hidden="true">继续学习</span>
                    </button>
                    @else
                    <button type="button" class="btn btn-default disabled btn-block" aria-label="Left Align">
                        <span class="glyphicon glyphicon-star" aria-hidden="true">毕业啦!</span>
                    </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="media">
            <div class=" panel-heading">
                <h4>视频列表</h4>
                <hr class="split-line">
            </div>
                @foreach($class_video_data as $item)
                    <div class="col-lg-4" >
                        <div class="text-center">
                            <h4 class="center-align" style="overflow: hidden; text-overflow: ellipsis;">{{$item->name}}</h4>
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
        {{$class_video_data->links()}}
    </div>

    <script>
        function classFollow(value) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post('/class/follow',
            {
               class_id:value
            },
            function (data,status) {
                console.log(data.code);
                if(data.code === 0) {
                    document.getElementById('follow').innerHTML = '继续学习';
                    $('#follow').removeClass('btn-danger').addClass('btn-success').addClass('disabled');
                }
            },'json')
        }
    </script>
@endsection