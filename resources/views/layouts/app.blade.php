<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
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
    </style>

</head>
<body>
    <div class="page-header wrapper">                
       <!-- Authentication Links -->
           <h1>OkinawaSpot</h1>
              <ul class="main-nav">
                 @guest
                     <li class="nav-item dropdown">
                         <button onclick="location.href='{{route('posts.index')}}'" class="btn btn-primary">ホーム</button>
                     </li>
                     <li>
                          <button onclick="location.href='{{route('login')}}'" class="btn btn-primary">ログイン</button>
                     </li>
                     @if (Route::has('register'))
                        <li>
                           <button onclick="location.href='{{route('register')}}'" class="btn btn-primary">登録</button>
                        </li>
                     @endif
                  @else
                     <li>
                       <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }}
                       </a>

                       <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                           <a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                           </a>

                           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                           </form>
                         </div>
                       </li>
                    @endguest 
                </ul>
              </div>
          <div class="mainpicture">
              <h2>ダレも見たことないオキナワへ</h2>
          </div>
          <hr size="1">

              <div class="content2">
        <main class="py-4">
            @yield('content')
        </main>
           </div>
          <div class="footer">
             copyright 2021 taga.
          </div>
          <div class ="footer2" width = max;>
                 <h2>&nbsp;os</h2>
         </div>
</body>
</html>
