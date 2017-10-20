<?php
/**
 * Created by PhpStorm.
 * User: yeyuhang
 * Date: 2017/10/20
 * Time: 下午1:39
 */

namespace App\Http\Controllers;


use App\Model\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $video = new Video();
        $data  = $video->find();
        return view('video.index',compact('data'));
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
}