@extends('layouts.app')

@section('content')
    @include('vendor.ueditor.assets')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">上传视频</div>
                    <div class="panel-body">
                        <form action="/video/store" method="post" >
                            {{csrf_field()}}
                            <div class="form-group {{$errors->has('title')?'has-error':''}}">
                                <label for="title">视频名称</label>
                                <input type="text" value="{{old('title')}}"  name="title" class="form-control" placeholder="标题" id="title" required>
                                @if($errors->has('title'))
                                    <span class="help-block"></span>
                                    <strong>{{$errors->first('title')}}</strong>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('content')?'has-error':''}}">
                                <label for="content">视频简介</label>
                                <input type="text" value="{{old('content')}}"  name="content" class="form-control" placeholder="视频简介" id="title" required>
                                @if($errors->has('content'))
                                    <span class="help-block"></span>
                                    <strong>{{$errors->first('content')}}</strong>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('body')?'has-error':''}}">
                                <label for="body">视频内容</label>
                                <script id="container"  name="body" type="text/plain" >
                                    {!! (old(('body')))!!}
                                </script>
                                @if($errors->has('body'))
                                    <span class="help-block"></span>
                                    <strong>{{$errors->first('body')}}</strong>
                                @endif
                            </div>

                            <button class="btn btn-success pull-right" type="submit">点击上传</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="http://apps.bdimg.com/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <script type="text/javascript">
        var ue = UE.getEditor('container',{
            toolbars: [
                ['fullscreen', 'source', 'undo', 'redo','horizontal','fontsize','fontfamily',
                    'bold','italic', 'justifycenter','underline', 'fontborder',
                    'strikethrough', 'time','date', 'spechars', 'forecolor', 'backcolor','attachment','insertvideo']
            ],
            elementPathEnabled:false,
            enableContextMenu:false,
            autoClearEmptyNode:true,
            wordCount:true,
            imagePopup:false,
            initialFrameHeight:200,
            autotypeset:{indent:true,imageBlockLine:'center'}

        });
    </script>

@endsection