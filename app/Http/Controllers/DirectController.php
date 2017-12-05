<?php
/**
 * Created by PhpStorm.
 * User: yeyuhang
 * Date: 2017/11/27
 * Time: 下午5:08
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Monolog\Handler\SocketHandler;
class DirectController extends Controller
{
    /**
     * DirectController constructor.
     * 实时通讯基础部分
     */
    public function __construct()
    {
        $this->socketString = 'test_broadCast';
    }

    /**
     * 聊天室首页
     */
    public function chatRoom()
    {
        return view('chatRoom.index');
    }

    public function test()
    {
        $server = new \swoole_websocket_server("192.168.1.99", 9501);

        $server->on('open', function (\swoole_websocket_server $server, $request) {
            file_put_contents( __DIR__ .'/log.txt' , $request->fd);
        });

        $server->on('message', function (\swoole_websocket_server $server, $frame) {
            global $client;
            $data = $frame->data;
            $m = file_get_contents( __DIR__ .'/log.txt');
            for ($i=1 ; $i<= $m ; $i++) {
                echo PHP_EOL . '  i is  ' . $i .  '  data  is '.$data  . '  m = ' . $m;
                $server->push($i, $data );
            }

        });

        $server->on('close', function ($ser, $fd) {
            echo "client {$fd} closed\n";
        });

        $server->start();
    }

    public function connect(Request $request)
    {
        $data = $request->all();
        $user_send_message = $data['message'];
        $client = new \swoole_client(SWOOLE_SOCK_TCP);

        //连接到服务器
        if (!$client->connect('127.0.0.1', 9503, 0.5))
        {
            die("connect failed.");
        }
        //向服务器发送数据
        if (!$client->send($user_send_message))
        {
            die("send failed.");
        }
        //从服务器接收数据
        $data = $client->recv();
        if (!$data)
        {
            die("recv failed.");
        }
        echo $data;
        //取消关闭关闭连接
        $client->close();
    }



}