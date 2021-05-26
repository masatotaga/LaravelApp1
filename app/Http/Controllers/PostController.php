<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\PostRequest;
//追加
use Illuminate\Support\Facades\Auth;
//追加
use InterventionImage;
//追加
use Intervention\Image\Facades\Image; // Imageファサードを使う
use Illuminate\Support\Facades\Storage; // Storageファサードを使う

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $q = \Request::query();

              if(isset($q['tcategory_id'])){
                  $posts = Post::latest()->where('tcategory_id',$q['tcategory_id'])->paginate(6); 
                  $posts->load('tcategory','scategory','user');

                  return view('posts.index',[
                      'posts' => $posts,        
                   ]);

             }elseif(isset($q['scategory_id'])){
                 $posts = Post::latest()->where('scategory_id',$q['scategory_id'])->paginate(6);
                 $posts->load('scategory','tcategory','user');

                return view('posts.index',[
                     'posts' => $posts,
                 ]);

            }else{
                $posts = Post::latest()->paginate(6);
                $posts->load('scategory','tcategory','user');

                return view('posts.index',[
                    'posts' => $posts,
                 ]);

            }  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create',[
         ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
       if($request->file('gazou_path')->isValid()){
            $post = new Post;
            $post->user_id = $request->user_id;
            $post->tcategory_id = $request->tcategory_id;
            $post->scategory_id = $request->scategory_id;
            $post->content = $request->content;
            $post->title = $request->title;
            $filename = $request->file('gazou_path')->store('public/image');
            $post->gazou_path = basename($filename);
            $post->save();
        }
        
        return redirect('/');       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->load('scategory','tcategory','user','comments.user');
        return view('posts.show',[
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function edit($id)
    {
        //投稿データの読み出し
        $post = Post::find($id);
        //投稿者なのかチェック
        if(auth()->user()->id != $post->user_id){
            return redirect(route('posts.index'))->with('error','許可されてない操作です');
        }
        return view('posts.edit')->with('post',$post);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'user_id' => 'required|numeric',
            'scategory_id' => 'required|numeric',
            'tcategory_id' => 'required|numeric',
            'gazou_path' => 'required|file|image',
        ]);

        $post = Post::find($id);
        if(auth()->user()->id != $post->user_id){
            return redirect(route('posts.index'))->with('error','許可されてない操作です');
        }

        $post->user_id = $request->user_id;
        $post->tcategory_id = $request->tcategory_id;
        $post->scategory_id = $request->scategory_id;
        $post->content = $request->content;
        $post->title = $request->title;

        $filename = $request->file('gazou_path')->store('public/image');

        $post->gazou_path = basename($filename);

        $post->save();

        return redirect(route('posts.index'))->with('success','ブログ記事を更新しました');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //投稿データの読み出し
        $post = Post::find($id);
        //投稿者なのかチェック
        if(auth()->user()->id != $post->user_id){
            return redirect(route('posts.index'))->with('error','許可されてない操作です');
        }

        $post -> delete();
        return redirect(route('posts.index'))->with('success','ブログ記事を削除しました');
    }

    public function search(Request $request)
    {
        $posts = Post::where('title','like',"%{$request->search}%")
                      ->orWhere('content','like',"%{$request->search}%")
                      ->orWhere('tcategory_id','like',"%{$request->search}%")
                      ->paginate(6);

        $search_result = $request->search.'の検索結果'.$posts->total().'件';
        
        return view('posts.index',[
            'posts' => $posts,
            'search_result' => $search_result,
            'search_query' => $request->search,
        ]);
    }

    public function page()
    {
        $user = Auth::user();
        $user->load('posts');
        
        if (Auth::check()) {
            return view('posts.page', [
                'user' => $user,
            ]);
        } else {
            return redirect('/');
        }
    }
}
