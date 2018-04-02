@extends('layouts.app')
@include('vendor.ueditor.assets')
@section('content')
    <div class="modal fade send_email" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">发送私信给 <small>{{\App\User::getName($data->user_id)->name}}</small></h4>
                </div>
                <div class="modal-body">
                    <textarea name="message" class="form-control" height="350" placeholder="对TA说点什么.."> </textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-primary" value="{{$data->user_id}}" onclick="sendEmail(this.value)">点击发送</button>
                </div>
            </div>
        </div>
    </div>
    {{--文章主体--}}
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
        <div class="panel-collapse col-lg-7 col-lg-offset-1">
        @if($data->user_id != \Illuminate\Support\Facades\Auth::id())
            @if($data->is_follow == 1)
                <button class="btn btn-info" id='follow-explore' value="{{$data->id}}" onclick="followToExplore(this.value)">取消关注</button>
            @else
                <button class="btn btn-success" id='follow-explore' value="{{$data->id}}" onclick="followToExplore(this.value)">关注问题</button>
            @endif
        @endif
            <button class="btn btn-success hidden" id='follow-explore' value="{{$data->id}}" onclick="followToExplore(this.value)">关注问题</button>
            <a id='write_answer' href="#answer_area" class="btn btn-default col-lg-offset-0 glyphicon glyphicon-pencil" onclick="writeAnswer()">写回答</a>
            <span class='col-lg-offset-1 glyphicon glyphicon-comment'> {{$data->comments_count}}条评论</span>
        </div>
    </div>
    {{--评论部分--}}
    <div class="container">
        {{--关于作者--}}
        <div class="panel pull-right col-md-4">
            <div class="panel-collapse">
                <h5 class="text-center">关于作者</h5>
            </div>
            <div class="panel-body">
                <div class="media-left text-center avatar">
                    @if(!empty(\App\Model\Avatar::getInfo($data->user_id)) && \App\Model\Avatar::getInfo($data->user_id)->url !="")
                        <img style="width: 55px;height: 55px" src="{{\App\Model\Avatar::getInfo($data->user_id)->url}}">
                    @else
                        <img style="width: 55px;height: 55px" src="/image/avatar/default_avatar.jpeg">
                    @endif
                </div>
                <span class="user_name media-middle media-right">
                    <h4>{{\App\User::getName($data->user_id)->name}} &nbsp; </h4>
                    <p class="user_name media-middle media-bottom">{{\App\Model\Avatar::getInfo($data->user_id)->user_label}}</p>
                </span>
                <h5 class="col-md-4 text-center">
                    回答
                </h5>
                <h5 class="col-md-4 text-center">
                    文章
                </h5>
                <h5 class="col-md-4 text-center">
                    关注者
                </h5>
                <h4 class="col-md-4 text-center">
                    1
                </h4>
                <h4 class="col-md-4 text-center">
                    2
                </h4>
                <h4 class="col-md-4 text-center">
                    3
                </h4>
                <div class="user_info">
                    @if($data->is_relation == 1)
                    <button class="btn btn-default col-sm-5 glyphicon glyphicon-heart-empty" value='{{$data->user_id}}' id="follow_user" onclick="followToUser(this.value)">
                        取消关注
                    </button>
                    @else
                    <button class="btn btn-info col-sm-5 glyphicon glyphicon-heart" value='{{$data->user_id}}' id="follow_user" onclick="followToUser(this.value)">
                        关注他
                    </button>
                    @endif
                    <button class="btn btn-default col-sm-5 col-lg-offset-2 glyphicon glyphicon-envelope" id="send_email" data-toggle="modal" data-target=".send_email">
                        发私信
                    </button>
                </div>
            </div>
        </div>
        {{--评论部分--}}
        @foreach($data['user_explore'] as $explore_comment)
            <div class="panel col-md-7">
                <div class="panel-heading">
                    <div class="media-heading">
                        <div class="media-left avatar">
                            @if(!empty(\App\Model\Avatar::getInfo($explore_comment->user_id)) && \App\Model\Avatar::getInfo($explore_comment->user_id)->url !="")
                                <img style="width: 45px;height: 45px" src="{{\App\Model\Avatar::getInfo($explore_comment->user_id)->url}}">
                            @else
                                <img style="width: 45px;height: 45px" src="/image/avatar/default_avatar.jpeg">
                            @endif
                        </div>
                        <span class="user_name media-middle media-right">{{\App\User::getName($explore_comment->user_id)->name}} &nbsp;
                            <h5 class="user_name media-middle media-bottom">{{\App\Model\Avatar::getInfo($explore_comment->user_id)->user_label}}</h5>
                        </span>
                    </div>
                </div>
                <div class="panel-body">
                    {!! $explore_comment->user_explore_content !!}
                </div>
                <div class="col-lg-offset-1 panel-collapse" >
                   <h5 style="color: #1f648b">编辑于{{ substr($explore_comment->updated_at,0,10)}}</h5>
                </div>
            </div>
        @endforeach
            <div id='answer_area' class="panel col-md-7 col-lg-offset-0 hidden">
                <div class="panel-heading">
                    <div class="media-left avatar">
                        @if(!empty(\App\Model\Avatar::getInfo(\Illuminate\Support\Facades\Auth::id())) && \App\Model\Avatar::getInfo(\Illuminate\Support\Facades\Auth::id())->url !="")
                            <img style="width: 45px;height: 45px" src="{{\App\Model\Avatar::getInfo(\Illuminate\Support\Facades\Auth::id())->url}}">
                        @else
                            <img style="width: 45px;height: 45px" src="/image/avatar/default_avatar.jpeg">
                        @endif
                    </div>
                    <span class="user_name media-middle media-right">{{\App\User::getName(\Illuminate\Support\Facades\Auth::id())->name}} &nbsp;
                            <h5 class="user_name media-middle media-bottom">{{\App\Model\Avatar::getInfo(\Illuminate\Support\Facades\Auth::id())->user_label}}</h5>
                        </span>
                </div>
                <div name="answer_area" class="panel-body" style="height: 200px">
                    <div id="editor_toolbar" class="toolbar" style="border:1px solid #ccc;"></div>
                    <div id="editor_text"  class="text" style="height: 120px;border: 1px solid #ccc;">
                    </div>
                    <button id='comment_submit' style="margin: 2px" class="btn btn-success pull-right">发表评论</button>
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
            document.getElementById('comment_submit').addEventListener('click', function () {
                // 读取 html
                postAnswerToServer(editor.txt.html());
                //alert(editor.txt.html())
            }, false)
        }
    </script>
    <script>
        /*
        关注问题
         */
        function followToExplore(value) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post('/explore/followToExplore',
                {
                    explore_id: value
                },
                function (data,status) {
                    if(data.code === 0) {
                        //未关注
                        if (data.data.is_follow === 0){
                            document.getElementById('follow-explore').innerHTML = '关注问题';
                            $('#follow-explore').addClass('btn-success').removeClass('btn-info');
                        } else {
                            document.getElementById('follow-explore').innerHTML = '取消关注';
                            $('#follow-explore').removeClass('btn-success').addClass('btn-info');
                        }
                    }
                },'json')
        }
        /*
        展示评论框
         */
        function writeAnswer() {
            $('#answer_area').fadeIn(600).removeClass('hidden')
        }
        /**
         * 提交评论
         * @param text
         */
        function postAnswerToServer(text) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post('/explore/addCommentToExplore',
                {
                    explore_content : text,
                    explore_id : document.getElementById('follow-explore').value
                },
                function (data,status) {
                    if(data.code === 0) {
                        //未关注
                       spop('<h4 class="spop-title">发布成功</h4>', 'success')
                       setTimeout(function(){window.location.reload();},2000)
                    }
                },'json')
            }
        /**
         * 关注用户
         */
        function followToUser(value) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post('/user/relation',
                {
                    target_user_id: value
                },
                function (data,status) {
                    if(data.code === 0) {
                        //未关注
                        if (data.data.is_relation === 1){
                            $('#follow_user').addClass('btn-default glyphicon-heart-empty').removeClass('btn-info glyphicon-heart');
                            document.getElementById('follow_user').innerHTML = '&nbsp;取消关注';

                        } else {
                            $('#follow_user').removeClass('btn-default glyphicon-heart-empty').addClass('btn-info glyphicon-heart');
                            document.getElementById('follow_user').innerHTML = '&nbsp;关注他';
                        }
                    }
                },'json')
        }

        /**
         * 发送私信
         * @param value
         */
        function sendEmail(value) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post('/user/message',
                {
                    target_user_id: value,
                    message : $(" textarea[ name='message'] ").val()
                },
                function (data,status) {
                    if(data.code === 0) {
                        spop('<h4 class="spop-title">发送成功</h4>', 'success')
                        $('.send_email').modal('hide')
                    }
                },'json')

        }
    </script>
@endsection