@extends('layouts.helloapp') <!--レイアウトの継承設定-->

@section('title','OkinawaSpot') <!--タイトルという名前のセクションにindexというテキスト値を設定します-->

@section('mainpicture')<!--menubarsectionの内容-->
  @parent<!--親レイアウトのsectionによって子のsection上書きするよ-->
  ダレも見たことない沖縄へ
@endsection

@section('content1')<!--contentのsectionを親で上書きするよ-->
  <h2>コメント</h2>
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

          <form action="{{route('comments.store')}}" method="POST">
            {{csrf_field()}}
            
            <div class="form-group">
              <label for="comment">Comment:</label></br>
              <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
            </div>

            <input type="hidden" name="user_id" value="{{Auth::id()}}">
            <input type="hidden" name="post_id" value="{{$post_id}}">

            <button type="submit" class="btn btn-primary">Submit</button>
         </form>
        </div>
      </div>
    </div>

@endsection

@section('footer')<!--fotterのsectionを親で上書きするよ-->
copyright 2021 taga.
@endsection