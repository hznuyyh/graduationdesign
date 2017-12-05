@extends('layouts.app')
    @section('content')
        <div class="container">
            <div class="content col-md-8 col-lg-offset-1">
                <div class="content">
                    <div class="center-block">
                        <label class="center-align">在线聊天室</label>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-body" style="height: 30em" id="receiveMessage">
                        <div class="text" name="history">
                            <p id="msg">
                                hello
                            </p>
                        </div>
                    </div>
                </div>
                    <div class="panel">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-pencil">Sending</span>
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-12 row">
                                <div class="input-group pull-right">
                                    <input type="text" class="form-control" placeholder="..." id="message">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default"  onclick="sendingMessage()" id="send">Go!</button>
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>


            </div>
        </div>

        <script language="JavaScript">

            var exampleSocket = new WebSocket("ws://47.95.205.248:9501");

            exampleSocket.onmessage = function (event) {
                console.log(event.data);
                var newMsg = event.data;
                $(document).ready(function(){
                    $("#msg").append("<p>"+newMsg+"</p>");
                });
            };
            exampleSocket.onopen = function (event) {

            };
            function sendingMessage() {
                var msg = document.getElementById('message').value;
                exampleSocket.send(msg);
            }

        </script>
    @endsection
