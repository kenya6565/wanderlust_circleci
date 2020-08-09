<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Http\Controllers;
use App\Library\BaseClass;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 
use \App\Post;
use \App\PostPhoto;
use \App\Comment;
use \App\User;
use Storage;

class TimelineController extends Controller
{
 
   public function index(Request $request)
   {
        //自分の投稿とフォローしてるユーザの投稿を取得してそれを作成日時順で表示
       
       
        //dd($user_posts);
       // もしログインユーザが誰かをフォローしていたならforeachでフォローしてるユーザ１つ１つの投稿を取得
        $user_id = [Auth::id()];
        if(count(Auth::user()->followings) > 0) {
            foreach( Auth::user()->followings as $following_user) {
                //フォローしてるユーザーのID＋ログインユーザのID
                array_push($user_id,$following_user->id);
            }
        }
        //postsテーブルのユーザID(投稿ユーザ)にフォローしてるユーザのIDかログインユーザのIDがあったら取得
        $all_posts = Post::whereIn('user_id',$user_id)
                           ->orderBy('created_at','DESC')
                           ->paginate(9);
                
        return view('user.timeline.index',compact(
            'all_posts'
        ));
        
   }
   
    public function post(Request $request)
    {
        
        $this->validate($request, Post::$rules);
        
        $form = $request->all();
        $post = new Post;
        $post->fill($form)->fill(['user_id' => Auth::id()])->save();
        //dd($request);
        if($request->hasFile('image')){
            //dd($images);
            foreach($request->file('image') as $image){
                //$image->store('/public/images');
                PostPhoto::create([
                    'post_id' => $post->id,
                    'image' => $image->hashName(),
                ]);
                \Image::make($image)->resize(800,1000)->save(storage_path('app/public/images/'.$image->hashName()));
                // $image_s3 = \Image::make($image)->resize(800,1000);
                // Storage::disk('s3')->putFile('/',$image_s3,'public');
                
                //デフォルトでこの値はstorage/appディレクトリに設定されています。
                //Storage::putFile('dir', $file);
                // で$fileを'dir'に保存することができます。Storage::putFileでは
                // ファイル名は自動で設定されます。
            }
        }
                // $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
                // $news->image_path = Storage::disk('s3')->url($path);
        return redirect(route('user_timeline'))->with('flash_message', '投稿が完了しました');
    }
    public function show(Request $request)
    {
        $post = Post::find($request->id);
        //dd($post);
        //投稿詳細で開いているpost以外の全ての同一ユーザの投稿を取得
        $recent_posts = Post::where('user_id',$post->user_id)
                            ->whereNotIn('id',[$post->id])
                            ->get();
    
        $images = $post->photos;
        //dd($images);
        //$images = \Image::make($images);
        //dd($images);
        //１つの投稿を表示する際それについてるコメントを表示

        $comments = Comment::where('post_id',$post->id)->get();
        //dd($comments);
        return view('user.timeline.detail', compact(
            'post',
            'comments',
            'recent_posts',
            'images'
        ));
    }
   public function edit($id)
    {
        //dd($id);
        
        $edit_post = Post::find($id);
        //dd($edit_post);
       
       
        return view('user.timeline.edit',compact(
            'edit_post'
        ));
    }
    
    
    public function update(Request $request)
    {
        $this->validate($request, Post::$rules);
        $post= Post::find($request->id);
        $updated_post = $request->all(); 
        //dd($updated_post);
        $post->fill($updated_post)->save();
        
        return redirect('/timeline'); 
    
    }
   
    public function delete(Request $request)
    {

        Post::find($request->id)->delete();
        return redirect(route('user_timeline')); 
    }

    public function search(Request $request)
    {
        //dd($request);
        $keyword = $request->input('keyword');
        //dd($keyword);
        //$results = [];
        if (isset($keyword)) {
            $results = Post::where('title', $keyword)
                   ->orderBy('created_at','DESC')
                   ->paginate(9);
        }else{
            $results = null;
        }
     
        return view('user.timeline.search', compact(
            'results',
            'keyword'
            
        ));
    }
}
