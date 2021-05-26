@extends('layouts.helloapp') 
@section('title','OkinawaSpot')
@section('navtitle0','ホーム')
@section('navtitle1','検索')
@section('navtitle2','投稿')
@section('navtitle3','ログイン')
@section('mainpicture')
  @parent
  ダレも見たことない沖縄へ
@endsection
@section('content1')
    <h2>{{$user->name}}の投稿</h2>
@endsection
@section('content2')
    
<div class ="card2">
    @foreach($user->posts as $post)
    <div class = "card2-body">
          <h5 class = "card2-maintitle">{{$post->title}}</h5>
          <div class="card2-main">
            <div class="card2-syousai">
              <h5 class = "card2-title">場所：
                <a href="{{route('posts.index',['tcategory_id' => $post->tcategory_id])}}">{{$post->tcategory->tcategory_name}}</a>
              </h5>
              <h5 class = "card2-title">季節：
                <a href="{{route('posts.index',['scategory_id' => $post->scategory_id])}}">{{$post->scategory->scategory_name}}</a>
              </h5>
              <h5 class = "card2-title">投稿者：
                <a href="{{route('users.show',$post->user_id)}}">{{$post->user->name}}</a>
              </h5>
                <p><a href="{{route('posts.show',$post->id)}}"class="btn btn-primary">詳細</a></p>
                <like></like>
            </div>
           </div>
          <div class = "card2-text">
            <p>{{$post->content}}</p>
          </div>
        </div>
    @endforeach
      </div>
    
@endsection
@section('footer')
copyright 2021 taga.
@endsection