<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">导航栏</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">登录</a></li>
                            <li><a href="{{ route('register') }}">注册</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            退出
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
    <div >
        <hr class="split-line" width="80%">
    </div>
    <footer style="padding-top: 20px;position: inherit;bottom: -100px;margin-bottom: 00px">
        <div class="jumbotron" style="padding: 20px">
            <h5 class="panel-heading col-md-3 col-md-offset-4" style="color: #2F3133; margin: 0px;padding-left: 160px" >
                杭州师范大学教学网
            </h5>
            <h4 style="float: right;" class="col-md-3 col-md-offset-4">
                <a href="https://github.com/hznuyyh/graduationdesign">GitHub仓库</a>
                <br>
                <small class="contact" onmouseover="showImage()" onmouseout="hiddenImage()" >与我联系</small>
                <img src="/image/531521876208_.pic.jpg" class="img-contact" style="width:300px;display:none;position:absolute;left: -300px;top: -300px;">
            </h4>
            <small style="float: inherit " >我们一直致力于为广大开发者提供更多的优质技术文档和辅助开发工具</small>
        </div>
    </footer>
    <script>
        function showImage() {
            $(".img-contact").fadeIn("300")
        }
        function hiddenImage() {
            $(".img-contact").fadeToggle("300")
        }
    </script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
