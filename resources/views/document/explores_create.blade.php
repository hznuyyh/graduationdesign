@extends('layouts.app')

@section('content')
    @include('vendor.ueditor.assets')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">发布问题</div>
                    <div class="panel-body">
                        {{csrf_field()}}
                        <div class="form-group {{$errors->has('title')?'has-error':''}}">
                            <label for="title">标题</label>
                            <input type="text" value="{{old('title')}}"  name="title" class="form-control" placeholder="标题" id="title">
                            @if($errors->has('title'))
                                <span class="help-block"></span>
                                <strong>{{$errors->first('title')}}</strong>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('body')?'has-error':''}}">
                            <label for="title">内容</label>
                            <div  class="panel-body" style="height: 200px">
                                <div id="editor_toolbar" class="toolbar" style="border:1px solid #ccc;"></div>
                                <div name='body' id="editor_text"  class="text" style="height: 120px;border: 1px solid #ccc;">
                                    {!! old('body') ? old('body') : '' !!}
                                </div>
                            </div>
                            @if ($errors->has('body'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                </span>
                            @endif
                        </div>
                        <button id='explore_create' class="btn btn-success pull-right" type="submit">发布问题</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="//unpkg.com/wangeditor/release/wangEditor.min.js"></script>
    <script type="text/javascript">
        window.onload = function(){
            var E = window.wangEditor
            var editor = new E('#editor_toolbar', '#editor_text')  // 两个参数也可以传入 elem 对象，class 选择器
            //var editor = new E( document.getElementById('editor') )
            editor.customConfig.menus = [
                'head',  // 标题
                'bold',  // 粗体
                'fontSize',  // 字号
                'fontName',  // 字体
                'italic',  // 斜体
                'underline',  // 下划线
                'strikeThrough',  // 删除线
                'link',  // 插入链接
                'list',  // 列表
                'justify',  // 对齐方式
                'emoticon',  // 表情
                'image',  // 插入图片
                'undo',  // 撤销
                'redo'  // 重复
            ]
            editor.create()
            document.getElementById('explore_create').addEventListener('click', function () {
                // 读取 html
                createExplore(editor.txt.html());
                //alert(editor.txt.html())
            }, false)
        }
        function createExplore(text) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post('/explore/store',
                {
                    title : $(" input[ name='title' ] ").val(),
                    body  : text
                },
                function (data,status) {
                    if(data.code === 0) {
                        //未关注
                        spop('<h4 class="spop-title">发布成功</h4>', 'success')
                        setTimeout(
                            function(){
                                window.location.href="/explore/index";
                            },2000)
                    }
                },'json')
        }
    </script>
@endsection