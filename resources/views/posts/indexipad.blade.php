@extends('layouts.helloapp') 

@section('title','OkinawaSpot')

@section('mainpicture')

@endsection

@section('content1')
  <h2>オキナワ探索</h2>
  <div class="hontou">
    <div class="hokubu">
      <p>北部</p>
      <table>
        <tr><td><a href="{{route('posts.index',['tcategory_id' => 1])}}">伊平屋村</a></td><td><a href="{{route('posts.index',['tcategory_id' => 2])}}">伊是名村</a></td><td><a href="{{route('posts.index',['tcategory_id' => 3])}}">国頭村</a></td><td><a href="{{route('posts.index',['tcategory_id' => 4])}}">今帰仁村</a></td></tr>
        <tr><td><a href="{{route('posts.index',['tcategory_id' => 5])}}">本部町</a></td><td><a href="{{route('posts.index',['tcategory_id' => 6])}}">伊江村</a></td><td><a href="{{route('posts.index',['tcategory_id' => 7])}}">大宜味村</a></td><td><a href="{{route('posts.index',['tcategory_id' => 8])}}">東村</a></td></tr>
        <tr><td><a href="{{route('posts.index',['tcategory_id' => 9])}}">名護市</a></td><td><a href="{{route('posts.index',['tcategory_id' => 10])}}">金武町</a></td><td><a href="{{route('posts.index',['tcategory_id' => 11])}}">宜野座村</a></td><td><a href="{{route('posts.index',['tcategory_id' => 12])}}">恩納村</a></td></tr>
      </table>
    </div>
    <div class="chubu">
      <p>中部</p>
      <table>
        <tr><td><a href="{{route('posts.index',['tcategory_id' => 13])}}">うるま市</a></td><td><a href="{{route('posts.index',['tcategory_id' => 14])}}">沖縄市</a></td><td><a href="{{route('posts.index',['tcategory_id' => 15])}}">読谷村</a></td><td><a href="{{route('posts.index',['tcategory_id' => 16])}}">嘉手納町</a></td></tr>
        <tr><td><a href="{{route('posts.index',['tcategory_id' => 17])}}">北谷町</a></td><td><a href="{{route('posts.index',['tcategory_id' => 18])}}">北中城村</a></td><td><a href="{{route('posts.index',['tcategory_id' => 19])}}">中城村</a></td><td><a href="{{route('posts.index',['tcategory_id' => 20])}}">西原町</a></td></tr>
        <tr><td><a href="{{route('posts.index',['tcategory_id' => 21])}}">宜野湾市</a></td><td><a href="{{route('posts.index',['tcategory_id' => 22])}}">浦添市</a></td></tr>
      </table>
    </div>
    <div class="nanbu">
      <p>南部</p>
      <table>
        <tr><td><a href="{{route('posts.index',['tcategory_id' => 23])}}">那覇市</a></td><td><a href="{{route('posts.index',['tcategory_id' => 24])}}">南風原町</a></td><td><a href="{{route('posts.index',['tcategory_id' => 25])}}">豊見城村</a></td><td><a href="{{route('posts.index',['tcategory_id' => 26])}}">八重瀬町</a></td></tr>
        <tr><td><a href="{{route('posts.index',['tcategory_id' => 27])}}">南城市</a></td><td><a href="{{route('posts.index',['tcategory_id' => 28])}}">与那原町</a></td><td><a href="{{route('posts.index',['tcategory_id' => 29])}}">糸満市</a></td><td><a href="{{route('posts.index',['tcategory_id' => 30])}}">久米島町</a></td></tr>
        <tr><td><a href="{{route('posts.index',['tcategory_id' => 31])}}">渡嘉敷村</a></td><td><a href="{{route('posts.index',['tcategory_id' => 32])}}">座間味村</a></td><td><a href="{{route('posts.index',['tcategory_id' => 33])}}">粟国村</a></td><td><a href="{{route('posts.index',['tcategory_id' => 34])}}">渡名喜村</a></td></tr>
        <tr><td><a href="{{route('posts.index',['tcategory_id' => 35])}}">北大東村</a></td><td><a href="{{route('posts.index',['tcategory_id' => 36])}}">南大東村</a></td></tr>
      </table>
    </div>
    <div class="yaeyama">
      <p>宮古・八重山</p>
      <table>
        <tr><td><a href="{{route('posts.index',['tcategory_id' => 37])}}">宮古島市</a></td><td><a href="{{route('posts.index',['tcategory_id' => 38])}}">多良間村</a></td></tr>
        <tr><td><a href="{{route('posts.index',['tcategory_id' => 39])}}">石垣市</a></td><td><a href="{{route('posts.index',['tcategory_id' => 40])}}">竹富町</a></td></tr>
        <tr><td><a href="{{route('posts.index',['tcategory_id' => 41])}}">与那国町</a></td></tr>
      </table>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h5 class="card-title">検索フォーム</h5>
        <div id="custom-search-input">
          <div class="input-group col-md-12">
            <form action="{{route('posts.search')}}" method="get">
              {{csrf_field()}}
              <input type="text" class="form-control input-lg" placeholder="検索名" name="search" value="">
              <span class="input-group-btn" style="position:relative; top:-37px;right:-202px;">
                <button class="btn btn-info" type="submit">
                  <i class="fas fa-search"><img src="{{ asset('../image/kensaku.png') }}" alt="ロゴ" width = 15px; height = 15px;></i>
                </button>
          </div>
        </div>
      </div>
    </div>
  </div>
    @isset($search_result)
   <h5>{{$search_result}}</h5>
    @endisset
@endsection

@section('content2')
    <div class="card2">
  @foreach($posts as $post)
      <div class="card2-body">
        <h5 class="card2-maintitle">{{$post->title}}</h5>
        <div class="card2-main">
          <div class="card2-syousai">
            <h5 class="card2-title">場所
               <a href="{{route('posts.index',['tcategory_id' => $post->tcategory_id])}}">{{$post->tcategory->tcategory_name}}</a>
            </h5>
            <h5 class="card2-title">季節
               <a href="{{route('posts.index',['scategory_id' => $post->scategory_id])}}">{{$post->scategory->scategory_name}}</a>
            </h5>
            <h5 class = "card2-title"><p>投稿者</p>
               <p><a href="{{route('users.show',$post->user_id)}}">{{$post->user->name}}</a></p>
            </h5>
            <p><a href ="{{route('posts.show',$post->id)}}" class="btn btn-primary">詳細</a></p>
          </div>
          <div class= "card2-picture">
             <img src="{{asset('storage/image/'.$post->gazou_path)}}" width =100%; height = 100%;>
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

    @if(isset($tcategory_id))
        {{$posts->appends(['tcategory_id' => $tcategory_id])->links()}}

    @elseif(isset($scategory_id))
        {{$posts->appends(['scategory_id' => $scategory_id])->links()}}

    @elseif(isset($search_query))
        {{$posts->appends(['search' => $search_query])->links()}}
    
    @else
        {{$posts->links()}}
    @endif
  
@endsection

@section('footer')
 copyright 2021 taga.
@endsection
