<?php
/**
 * Created by PhpStorm.
 * User: yeyuhang
 * Date: 2017/10/20
 * Time: 下午1:39
 */

namespace App\Http\Controllers;


use App\Model\ClassModel\ClassModel;
use App\Model\ClassModel\ClassVideoModel;
use App\Model\UserModel\UserClassModel;
use App\Model\Video;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use FRLog\Log;

class VideoController extends Controller
{
    /**
     * @param $class_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 课程视频首页
     */
    public function index($class_id)
    {
        $class_video      = new ClassVideoModel();
        $class            = new ClassModel();
        $user_class       = new UserClassModel();
        $class_video_data = $class_video->getClassVideoByClassId($class_id);
        $class_info_data  = $class->getClassInfoById($class_id);
        $class_count      = $user_class->getCountUserClass($class_id);
        $user_class_data  = $user_class->getUserClassProgress(Auth::id(),$class_id);
        if ($user_class_data == null || $user_class_data->class_progress == 0) {
            $class_progress = 0;
        } else {
            $class_progress = $user_class_data->class_progress;
        }
        return view('video.index',[
            'class_video_data' => $class_video_data,
            'class_info_data'  => $class_info_data,
            'count'            => $class_count,
            'class_progress'   => $class_progress
        ]);
    }

    public function create()
    {
        return view('video.create');
    }

    public function store(Request $request)
    {
         $data = $request->all();
         $insert_data = [
             'name'    => $data['title'],
             'content' => $data['content'],
             'url'     => $data['body']
         ];
         $video = new Video();
         $video->insert($insert_data);
         return redirect('/video/index');
    }

    public function test()
    {
        Log::w("composer_test","hello,world","to_try");
    }
}