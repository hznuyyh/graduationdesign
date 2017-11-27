<?php
/**
 * Created by PhpStorm.
 * User: yeyuhang
 * Date: 2017/11/27
 * Time: 下午5:08
 */

namespace App\Http\Controllers;


use Monolog\Handler\SocketHandler;
class DirectController extends Controller
{

    public function __construct()
    {
        $this->socketString = 'test_broadCast';
    }

    public function test()
    {
        $server = new \swoole_server("127.0.0.1", 9503);
        $server->on('connect', function ($server, $fd){
            echo "connection open: {$fd}\n";
        });
        $server->on('receive', function ($server, $fd, $reactor_id, $data) {
            $server->send($fd, "Swoole: {$data}");
            $server->close($fd);
        });
        $server->on('close', function ($server, $fd) {
            echo "connection close: {$fd}\n";
        });
        $server->start();
    }

    public function connect()
    {
        $client = new \swoole_client(SWOOLE_SOCK_TCP);

        //连接到服务器
        if (!$client->connect('127.0.0.1', 9503, 0.5))
        {
            die("connect failed.");
        }
        //向服务器发送数据
        if (!$client->send("hello world"))
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
        //关闭连接
        $client->close();
    }


}