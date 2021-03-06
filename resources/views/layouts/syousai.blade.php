<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{csrf_token()}}">
        <title>@yield('title')</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
    a{text-decoration: none; color: #97cdf3;}
    a:hover {color: gold;}
    body {font-size:16pt; color:#999; margin: 5px}
    h1 {font-size:50pt; text-align:left; color:#f6f6f6;
           margin: 5px 0px 0px 0px; letter-spacing:-4pt;}
    ul {font-size:12pt;}
    hr {margin:25px 100px; border-top: 1px dashed #ddd;}
    .main-nav{display: flex; font-size: 1.25rem; text-transform: uppercase; margin-top: 20px; list-style: none;}
    .main-nav li{margin-left: 36px;}
    .nav-button{background-color:#578342;}
    .page-header{display: flex; justify-content: space-between; background-color:#432;}
    .wrapper{max-width: 1500px; margin: 0 auto; padding: 0 4%;}
    .mainpicture{max-width:1500px; height:200px; margin: -22px auto 0; background-image:url("../image/okinawaspot.png");}
    .mainpicture h2{text-align:center; padding:90px 0;}
    .content1 {border:double 4px #ccc; margin:10px; padding:10px; background-color:#fafafa;}/*#fafafa*/
    .content2 {border:double 4px #ccc; margin:10px; padding:10px; background-color:#e2eba3;}
    .content h2{margin:10px 20px; color:#999; font-size:16pt; font-weight:bold;}
    .content p{margin:5px 20px; color:#999; font-size:12pt;}
    .url{margin:10px 20px; color:#aaa; font-size:12pt;}
    .link {margin:10px;}
    .footer {text-align:right; font-size:10pt; margin:10px;
             border-bottom:solid 1px #ccc; color:#ccc;}
    .footer2 {background-color:#432;}
    /*hello */
    .hontou{display: flex; font-size: 12px; text-transform: uppercase; margin: 10px auto 0; list-style: none;}
    .nanbu{margin:5px auto 0;}
    .hokubu{margin:5px auto 0;}
    .tyubu{margin:5px auto 0;}
    .yaeyama{margin:5px auto 0;}
    /*staff */
    .zyouhou th{background-color:#999; color:fff; padding:5px 10px;}
    .zyouhou td{border: solid 1px #aaa; color:#999; padding:5px 10px;}
    /*card*/
    .card2{display: flex; flex-wrap: wrap;}
    .card2-body {width: 500px; min-height: 1px; padding: 1.25rem; background-color:#fafafa; border-radius: 5%; margin-top:15px;}
    .card2-maintitle {text-align: center; border:double 4px #ccc; margin-top:0px;}
    .card2-title {margin-bottom: 0.75rem; margin-top: 5px;}
    .card2-title a{text-align: center;}
    .card2-main {display: flex;}
    .card2-syousai {margin-top: 0px; border: 0.2rem solid yellow;}
    .card2-picture{margin-left: 15px; margin-top: 0px; width:330px; height:200px; border: 0.2rem solid pink;}
    .card2-text{border: 0.2rem double lightblue; width: 450px; height:100px; margin-top: 10px;}
    .card2-text:last-child {margin-bottom: 0;}
    .card2-link:hover {text-decoration: none;}
    .card2-link + .card-link {margin-left: 1.25rem;}
    .card2-header {padding: 0.75rem 1.25rem; margin-bottom: 0; background-color: rgba(0, 0, 0, 0.03); border-bottom: 1px solid rgba(0, 0, 0, 0.125);}
    /*card3*/
     .card-body3 {width: 500px; min-height: 1px; padding: 1.25rem; background-color:#fafafa; border-radius: 5%; margin-top:15px;}
        </style>
</head>
<body>
    @guest
    <div class="page-header wrapper">
        <h1>@yield('title')</h1>
        <nav>
            <ul class="main-nav">
                <li><input type="button" class="btn btn-primary" onclick="location.href='{{url('/')}}'" value="?????????"></li>
                <li><input type="button" class="btn btn-primary" onclick="location.href='{{ route('register') }}'" value="??????"></li>
                <li><input type="button" class="btn btn-primary" onclick="location.href='{{url('/login')}}'" value="????????????"></li>
            </ul>
        </nav>
    </div>
    @else
    <div class="page-header wrapper">
        <h1>@yield('title')</h1>
        <nav>
            <ul class="main-nav">
                <!--<li class="nav-item dropdown">
                    <input type="button" id="navbarDropdown" class="nav-link dropdown-toggle" onclick="location.href='#'" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre value="{{ Auth::user()->name }}">
                </li>-->

                <li class="nav-item dropdown">
                    <button onclick="location.href='{{route('posts.index')}}'" class="btn btn-primary">?????????</button>
                </li>

                <li class="nav-item dropdown">
                    <button onclick="location.href='{{route('posts.page')}}'" class="btn btn-primary">??????</button>
                </li>
                

                <li class="nav-item dropdown">
                  <input type="button" value="???????????????"  class="btn btn-primary"
                    onclick="location.href='{{ route('logout') }}';
                    event.preventDefault();
                    document.getElementById('logout-form').submit();"><!--{{ __('Logout') }}-->
                </li>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>

            </ul>
        </nav>
    </div>
    @endguest

    @section('mainpicture')
        <div class="mainpicture">
            <h2>??????????????????????????????????????????</h2>
        </div>
    <hr size="1">
    <div class="content">
        <div class="content1">
        @yield('content1')
        </div>
        <div class="content2">
        @yield('content2')
        </div>
    </div>
    <div class="url">
    @yield('url')
    </div>
    <div class="footer">
    @yield('footer')
    </div>
    <div class ="footer2" width = max;>
      <h2>&nbsp;os</h2>
    </div>
</body>
</html>
