<?php
/**
 * Created by PhpStorm.
 * User: yeyuhang
 * Date: 2017/12/3
 * Time: 下午11:10
 */

namespace App\Http;


class SwooleServer
{
    private $serv;
    private $conn = null;
    private static $fd = null;

    public function __construct()
    {
        $this->serv = new \swoole_websocket_server("0.0.0.0", 9502);
        $this->serv->set(array(
            'worker_num' => 8,
            'daemonize' => false,
            'max_request' => 10000,
            'dispatch_mode' => 2,
            'debug_mode' => 1
        ));

        $this->serv->on('Open', array($this, 'onOpen'));
        $this->serv->on('Message', array($this, 'onMessage'));
        $this->serv->on('Close', array($this, 'onClose'));

        $this->serv->start();

    }

    function onOpen($server, $req)
    {
        // $server->push($req->fd, json_encode(33));
    }

    public function onMessage($server, $frame)
    {
        $server->push();

    }


    public function onClose($server, $fd)
    {
        $this->unBind($fd);
        echo "connection close: " . $fd;
    }


    /*******************/
}

$server = new SwooleServer();