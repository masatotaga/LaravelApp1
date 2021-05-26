@extends('layouts.syousai') 
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
    <h2>詳細画面</h2>
@endsection
@section('content2')
    
      <div class ="card2">
        <div class = "card2-body">
          <h5 class = "card2-maintitle">{{$post->title}}</h5>
          <div class = "card2-main">
            <div class = "card2-syousai">
              <h5 class = "card2-title">場所：{{$post->tcategory->tcategory_name}}</h5>
              <h5 class = "card2-title">季節：{{$post->scategory->scategory_name}}</h5>
              <h5 class = "card2-title">投稿者：{{$post->user->name}}</h5>
            </div>
            <div class = "card-picture">
              <img src="{{asset('storage/image/'.$post->gazou_path)}}" width = 100%; height = 100%;>
            </div>
        </div>
        <div class = "card2-text">
          <p>{{$post->content}}</p>
        </div>
      </div>

      <div class="p-3">
      @foreach($post->comments as $comment)
        <div class ="card3">
          <div class = "card3-body">
            <p class = "card3-text">{{$comment->comment}}</p>
            <p class = "card3-text">投稿者：<a href="{{route('users.show',$comment->user->id)}}">{{$comment->user->name}}</a></p>
          </div>
        </div>
        @endforeach
        <a href="{{route('comments.create',['post_id' => $post->id])}}" class="btn btn-primary">コメントする</a>
      </div>
    
@endsection
@section('footer')
copyright 2021 taga.
@endsection