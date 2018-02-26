<?php
/**
 * Created by PhpStorm.
 * User: yeyuhang
 * Date: 2017/11/27
 * Time: 下午5:08
 */

namespace App\Http\Controllers;


class DirectController extends Controller
{

    /**
     * 聊天室首页
     */
    public function chatRoom()
    {
        return view('chatRoom.live');
    }

    /**
     * 聊天室录制
     */
    public function cameraRoom()
    {
       return view('chatRoom.camera');
    }

}