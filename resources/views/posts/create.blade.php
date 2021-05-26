@extends('layouts.helloapp') 

@section('title','OkinawaSpot')

@section('mainpicture')
  @parent
  ダレも見たことない沖縄へ
@endsection

@section('content1')
  <h2>投稿作成画面</h2>
@endsection

@section('content2')
   <div class="card-body">
     @if(session('status'))
       <div class="alert alert-success" role="alert">
         {{session('status')}}
       </div>
     @endif

     <div class="card">
        <div class="card-body">
        @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
        @endif

          <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}

          <div class="form-group">
            <label for="exampleInputEmail1">タイトル</label>
            <Input type="text" class="form-control" id="exampleInputEmail1"  placeholder="title" name="title">
          </div>

          <div class="form-group">
            <label for="exampleFormControlFile1">画像ファイル</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="gazou_path">
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">季節</label>
            <select class="form-control" id="exampleFormControlSelect1" name="scategory_id">
              <option selected="">選択する</option>
              <option value="1">春</option>
              <option value="2">夏</option>
              <option value="3">秋</option>
              <option value="4">冬</option>
            </select>
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">地域</label>
            <select class="form-control" id="exampleFormControlSelect2" name="tcategory_id">
              <option selected="">選択する</option>
              <option value="1">伊平屋</option>
              <option value="2">伊是名</option>
              <option value="3">国頭</option>
              <option value="4">今帰仁</option>
              <option value="5">本部</option>
              <option value="6">伊江</option>
              <option value="7">大宜味</option>
              <option value="8">東</option>
              <option value="9">名護</option>
              <option value="10">金武</option>
              <option value="11">宜野座</option>
              <option value="12">恩納</option>
              <option value="13">うるま</option>
              <option value="14">沖縄</option>
              <option value="15">読谷</option>
              <option value="16">嘉手納</option>
              <option value="17">北谷</option>
              <option value="18">北中城</option>
              <option value="19">中城</option>
              <option value="20">西原</option>
              <option value="21">宜野湾</option>
              <option value="22">浦添</option>
              <option value="23">那覇</option>
              <option value="24">南風原</option>
              <option value="25">豊見城</option>
              <option value="26">八重瀬</option>
              <option value="27">南城</option>
              <option value="28">与那原</option>
              <option value="29">糸満</option>
              <option value="30">久米島</option>
              <option value="31">渡嘉敷</option>
              <option value="32">座間味</option>
              <option value="33">粟国</option>
              <option value="34">渡名喜</option>
              <option value="35">北大東</option>
              <option value="36">南大東</option>
              <option value="37">宮古島</option>
              <option value="38">多良間</option>
              <option value="39">石垣</option>
              <option value="40">竹富</option>
              <option value="41">与那国</option>
              </select>
            </div>

            <div class="form-group">
              <label for="comment">コメント:</label></br>
              <textarea class="form-control" rows="5" id="comment" name="content"></textarea>
            </div>

            <input type="hidden" name="user_id" value="{{Auth::id()}}">

            <button type="submit" class="btn btn-primary">Submit</button>
         </form>
        </div>
      </div>
    </div>

@endsection

@section('footer')<!--fotterのsectionを親で上書きするよ-->
copyright 2021 taga.
@endsection