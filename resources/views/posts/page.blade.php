@extends('layouts.hellopage') <!--レイアウトの継承設定-->

@section('title','OkinawaSpot') <!--タイトルという名前のセクションにindexというテキスト値を設定します-->

@section('navtitle0','ホーム')

@section('navtitle1','検索')

@section('navtitle2','投稿')

@section('navtitle3','ログイン')

@section('mainpicture')<!--menubarsectionの内容-->
  @parent<!--親レイアウトのsectionによって子のsection上書きするよ-->
  ダレも見たことない沖縄へ
@endsection

@section('content1')<!--contentのsectionを親で上書きするよ-->
  <h2>MyPage:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ようこそ&nbsp;&nbsp;{{$user->name}}&nbsp;&nbsp;さん</h2>
@endsection

@section('content3')
<div class="card2">
<li class="nav-item dropdown">
&nbsp;&nbsp;<button onclick="location.href='{{route('posts.create')}}'" class="btn btn-primary">投稿する</button>
</li>
</div>
@endsection

@section('content2')
  <h2>{{$user->name}}さんの投稿一覧</h2>
<div class ="card2">
    @foreach($user->posts as $post)
    <div class = "card2-body">
        <h5 class = "card2-maintitle">{{$post->title}}</h5>
        <div class = "card2-main">
          <div class = "card2-syousai">
            <h5 class = "card2-title">場所：
            <a href="{{route('posts.index',['tcategory_id' => $post->tcategory_id])}}">{{$post->tcategory->tcategory_name}}</a>
            </h5>
            <h5 class = "card2-title">季節：
            <a href="{{route('posts.index',['scategory_id' => $post->scategory_id])}}">{{$post->scategory->scategory_name}}</a>
            </h5>
            <h5 class = "card2-title"><p>投稿者</p>
                <p><a href="{{route('users.show',$post->user_id)}}">{{$post->user->name}}</a></p>
              </h5>
            <a href="{{route('posts.show',$post->id)}}"class="btn btn-primary">詳細</a>
            @if(!Auth::guest() && Auth::user()->id == $post->user_id)
              <input type="button" class="btn btn-primary" onclick="location.href='{{route('posts.edit',$post->id)}}'" value="編集">
              <form action="{{route('posts.destroy',$post->id)}}" method="post" class="float-right">
                @csrf
                @method('delete')
                <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("削除しますか？");'>
              </form>
          @endif
          </div>
          <div class = "card2-picture">
            <img src="{{asset('storage/image/'.$post->gazou_path)}}" width = 100%; height = 100%;>
          </div>
        </div>
        <div class = "card2-text">
          <p>{{$post->content}}</p>
        </div>
    </div>
    @endforeach
</div>
@endsection

@section('url')

@endsection

@section('footer')<!--fotterのsectionを親で上書きするよ-->
copyright 2021 taga.
@endsection