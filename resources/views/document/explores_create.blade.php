@extends('layouts.app')

@section('content')
    @include('vendor.ueditor.assets')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">发布问题</div>
                    <div class="panel-body">
                        <form action="http://localhost/laravel-zhihu/laravel/public/questions" method="post" >
                            {{csrf_field()}}
                            <div class="form-group {{$errors->has('title')?'has-error':''}}">
                                <label for="title">标题</label>
                                <input type="text" value="{{old('title')}}"  name="title" class="form-control" placeholder="标题" id="title">
                                @if($errors->has('title'))
                                    <span class="help-block"></span>
                                    <strong>{{$errors->first('title')}}</strong>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('topics')?'has-error':''}}">
                                <label for="topic">标签</label></br>
                                <select name = 'topics[]' class=" js-example-placeholder-multiple js-data-example-ajax form-control"  multiple="multiple" required="required">
                                </select>
                                @if($errors->has('topics'))
                                    <span class="help-block"></span>
                                    <strong>{{$errors->first('topics')}}</strong>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('body')?'has-error':''}}">
                                <label for="body">内容</label>
                                <script id="container"  name="body" type="text/plain" >
                                    {!! (old(('body')))!!}
                                </script>
                                @if($errors->has('body'))
                                    <span class="help-block"></span>
                                    <strong>{{$errors->first('body')}}</strong>
                                @endif
                            </div>

                            <button class="btn btn-success pull-right" type="submit">发布问题</button>
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
                    'strikethrough', 'time','date', 'spechars', 'forecolor', 'backcolor','attachment']
            ],
            elementPathEnabled:false,
            enableContextMenu:false,
            autoClearEmptyNode:true,
            wordCount:true,
            imagePopup:false,
            initialFrameHeight:200,
            autotypeset:{indent:true,imageBlockLine:'center'}

        });
        ue.ready(function () {
            ue.execCommand('serverparam','_token',Laravel.csrfToken);
        });
    </script>
    <script type="text/javascript">
        function formatTopic (topic) {
            return "<div class='select2-result-repository clearfix'>" +
            "<div class='select2-result-repository__meta'>" +
            "<div class='select2-result-repository__title'>" +
            topic.name ? topic.name : "Laravel"   +
                "</div></div></div>";
        }

        function formatTopicSelection (topic) {
            return topic.name || topic.text;
        }

        $(".js-example-placeholder-multiple").select2({
            tags: true,
            placeholder: '选择相关话题',
            minimumInputLength: 2,
            ajax: {
                url: '/laravel-zhihu/laravel/public/api/topics',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function (data, params) {
                    return {
                        results: data
                    };
                },
                cache: true
            },
            templateResult: formatTopic,
            templateSelection: formatTopicSelection,
            escapeMarkup: function (markup) { return markup; }
        });
    </script>


@endsection