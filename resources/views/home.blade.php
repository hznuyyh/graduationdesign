@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong class="text-center"> 欢迎回来!</strong>
        </div>
        <div class="col-md-3">
            <div class="row panel-heading">
                <h3 class="glyphicon glyphicon-list-alt">
                    全部精品课
                </h3>
            </div>
            <div class="list-group col-md-12" id="menu-left">
                <div class="list-group-item" id="bangong">
                    <h4>办公效率 &empty;
                        <small> PPT Excel Word</small>
                    </h4>
                </div>
                <div class="list-group-item" id="zhiye">
                    <h4>职业发展 &eacute;
                        <small> 个人成长 演讲口才</small>
                    </h4>
                </div>
                <div class="list-group-item" id="biancheng">
                    <h4>编程开发 &backepsilon;
                        <small> 人工智能 后端开发</small>
                    </h4>
                </div>
                <div class="list-group-item" id="shenghuo">
                    <h4>生活方式 &sacute;
                        <small> 书法 摄影 音乐</small>
                    </h4>
                </div>
                <div class="list-group-item" id="yuyan">
                    <h4>语言学习 &yfr;
                        <small> 英语 法语 俄语</small>
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-md-offset-0  menu-right  active  bangong-menu" id="bangong-menu">
            <div class="row panel-heading">
                <h3 class=""></h3>
            </div>
            <div class=" panel-body" >
                <div class="list-group-item">
                    <h5>办公软件&nbsp;&nbsp;
                        <small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;PPT&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Excel&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Word&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;KeyNote&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Project</small>
                    </h5>
                </div>
                <div class="list-group-item">
                    <h5>工作效率&nbsp;&nbsp;
                        <small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;时间管理&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;思维导图&nbsp;&nbsp;&nbsp;</small>
                    </h5>
                </div>
                <div class="list-group-item">
                    <h5>电脑基础 &nbsp;&nbsp;
                        <small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;基础操作&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;常用工具&nbsp;&nbsp;&nbsp;</small>
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-md-offset-0  menu-right  hidden zhiye-menu"   id="zhiye-menu">
            <div class="row panel-heading">
                <h3 class=""></h3>
            </div>
            <div class=" panel-body">
                <div class="list-group-item">
                    <h5>求职应聘&nbsp;&nbsp;
                        <small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;职业规划&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;求职简历&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;面试技巧&nbsp;&nbsp;&nbsp;</small>
                    </h5>
                </div>
                <div class="list-group-item">
                    <h5>个人提升&nbsp;&nbsp;
                        <small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;知识管理&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;习惯养成&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;演讲与口才&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;个人品牌&nbsp;&nbsp;&nbsp;</small>
                    </h5>
                </div>
                <div class="list-group-item">
                    <h5>职场能力 &nbsp;&nbsp;
                        <small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;职场经验&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;人脉管理&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;人际沟通&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;礼仪形象&nbsp;&nbsp;&nbsp;</small>
                    </h5>
                </div>
                <div class="list-group-item">
                    <h5>专业岗位 &nbsp;&nbsp;
                        <small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;医学科研&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;文献写作&nbsp;&nbsp;&nbsp;</small>
                    </h5>
                </div>
                <div class="list-group-item">
                    <h5>管理能力 &nbsp;&nbsp;
                        <small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;领导力&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;人力资源&nbsp;&nbsp;&nbsp;</small>
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-md-offset-0  menu-right  hidden biancheng-menu" id="biancheng-menu">
            <div class="row panel-heading">
                <h3 class=""></h3>
            </div>
            <div class="panel-body" >
                <div class="list-group-item">
                    <h5>编程语言&nbsp;&nbsp;
                        <small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Python&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;PHP&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Java&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Go&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;C++&nbsp;&nbsp;&nbsp;</small>
                    </h5>
                </div>
                <div class="list-group-item">
                    <h5>人工智能与数据&nbsp;&nbsp;
                        <small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;人工智能&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;数据分析&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;大数据&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;数据库&nbsp;&nbsp;&nbsp;</small>
                    </h5>
                </div>
                <div class="list-group-item">
                    <h5>前端开发 &nbsp;&nbsp;
                        <small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;开发语言&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;开发框架&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;开发实践&nbsp;&nbsp;&nbsp;</small>
                    </h5>
                </div>
                <div class="list-group-item">
                    <h5>后端开发 &nbsp;&nbsp;
                        <small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Java Web&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;PHP Web&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Node.js&nbsp;&nbsp;&nbsp;</small>
                    </h5>
                </div>
                <div class="list-group-item">
                    <h5>移动开发 &nbsp;&nbsp;
                        <small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Ios&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Android&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;手游开发&nbsp;&nbsp;&nbsp;</small>
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-md-offset-0  menu-right  hidden shenghuo-menu" id="shenghuo-menu">
            <div class="row panel-heading">
                <h3 class=""></h3>
            </div>
            <div class="panel-body" >
                <div class="list-group-item">
                    <h5>摄影影视&nbsp;&nbsp;
                        <small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;摄影基础&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;摄影后期&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;AE特效&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;影视基础&nbsp;&nbsp;&nbsp;</small>
                    </h5>
                </div>
                <div class="list-group-item">
                    <h5>音乐乐器&nbsp;&nbsp;
                        <small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;乐理基础&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;声乐唱歌&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;编曲创作&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;更多乐器&nbsp;&nbsp;&nbsp;</small>
                    </h5>
                </div>
                <div class="list-group-item">
                    <h5>运动健康 &nbsp;&nbsp;
                        <small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;体育运动&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;健身&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;舞蹈&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;瑜伽&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;武术&nbsp;&nbsp;&nbsp;</small>
                    </h5>
                </div>
                <div class="list-group-item">
                    <h5>心理学 &nbsp;&nbsp;
                        <small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;恋爱&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;情绪管理&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;个人成长&nbsp;&nbsp;&nbsp;</small>
                    </h5>
                </div>
                <div class="list-group-item">
                    <h5>居家生活 &nbsp;&nbsp;
                        <small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;美食烹饪&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;家居装饰&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;时尚美妆&nbsp;&nbsp;&nbsp;</small>
                    </h5>
                </div>
                <div class="list-group-item">
                    <h5>个人修养 &nbsp;&nbsp;
                        <small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;绘画&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;书法&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;手工DIY&nbsp;&nbsp;&nbsp;</small>
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-md-offset-0  menu-right  hidden yuyan-menu" id="yuyan-menu">
            <div class="row panel-heading">
                <h3 class=""></h3>
            </div>
            <div class="panel-body" >
                <div class="list-group-item">
                    <h5>实用英语&nbsp;&nbsp;
                        <small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;口语&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;英语单词&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;四六级&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;新概念&nbsp;&nbsp;&nbsp;</small>
                    </h5>
                </div>
                <div class="list-group-item">
                    <h5>日语&nbsp;&nbsp;
                        <small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;五十音图&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;大家的日语&nbsp;&nbsp;&nbsp;</small>
                    </h5>
                </div>
                <div class="list-group-item">
                    <h5>法语 &nbsp;&nbsp;
                        <small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;法语基础&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;法语考试&nbsp;&nbsp;&nbsp;</small>
                    </h5>
                </div>
                <div class="list-group-item">
                    <h5>更多小语种 &nbsp;&nbsp;
                        <small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;德语&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;韩语&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;西班牙语&nbsp;&nbsp;&nbsp;</small>
                    </h5>
                </div>
                <div class="list-group-item">
                    <h5>出国留学 &nbsp;&nbsp;
                        <small> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;雅思&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;托福&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;SAT&nbsp;&nbsp;&nbsp;</small>
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-lg-offset-0">
            <div class="row panel-heading">
                <h3 class=""></h3>
            </div>
            <div class="panel-body list-group">
                <div class="panel-content list-group-item alert-danger">
                    <div class="glyphicon glyphicon-folder-open">
                        我的收藏
                    </div>
                </div>
                <div class=" panel-content list-group-item">
                    <div class="glyphicon glyphicon-question-sign">
                        我关注的问题
                    </div>
                </div>
                <div class=" panel-content list-group-item">
                    <div class="glyphicon glyphicon-magnet ">
                        我的邀请
                    </div>
                </div>
                <div class="panel-content list-group-item">
                    <div class="glyphicon glyphicon-log-in">
                        社区服务中心
                    </div>
                </div>
                <div class=" panel-content list-group-item">
                    <div class="glyphicon glyphicon-ok">
                        版权服务中心
                    </div>
                </div>
                <div class="panel-content list-group-item">
                    <div class="glyphicon glyphicon-object-align-bottom">
                        公共编辑状态
                    </div>
                </div>

            </div>
        </div>
    </div>
    <hr class="split-line" width="80%">
    <div >
        <div class="panel-heading col-md-offset-1">
            <div class="row panel-heading">
                <h3 class="glyphicon glyphicon-play">
                    我的课程
                </h3>
            </div>
        </div>
        <div style="margin: 40px;margin-left: -35px; height: 920px">
            @foreach ($user_class as $u )
                <div class="panel col-md-3 col-lg-offset-1" style="padding: 0px">
                    <div class="panel-heading">
                        <h3 class="icon-font" style="margin: 2px">{{$u->class_name}}</h3>
                    </div>
                    <div class="panel-body" style="padding: 0px;">
                        <img style="width: 100%;height: 100%;padding: 0px" src={{$u->class_img_src}}>
                    </div>
                    <div class="panel-body col-md-12" style="padding-top: -200px">
                        <?php
                        if (strlen($u->class_description) > 120 ){
                            echo "<small class='image-class'>".substr($u->class_description,0,60) . "...." . "</small>";
                        } else {
                            echo "<small>".$u->class_description . "</small>";
                        }
                        ?>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
