<?php

namespace App\Http\Controllers;
use App\Post;
use App\Comment;
use App\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
      $posts = Post::latest()->with('user')->with('comments')->paginate(1);
      foreach($posts as $post){
          $post->setAttribute('created_at',$post->created_at->diffForHumans());
      }
      return response($posts);
    }


    public function show(Post $post){

        return  response([
            'id'=> $post->id,
            'slug'=> $post->slug,
            'body'=>$post->body,
            'created_at'=>$post->created_at->diffForHumans(),
            'coments_count'=>$post->comments->count(),
            'image'=>$post->image,
            'users'=>$post->user->name,
            'title'=>$post->title,
            'comments'=>$this->commentsFormatted($post->comments),
            'category'=>$post->category->name,

        ]);
    }
    public function commentsFormatted($Comments){
               $new_comments=[];
               foreach($Comments as $comment ){
                 array_push($new_comments,[
                      'id'=>$comment->id,
                      'body'=>$comment->body,
                      'user'=>$comment->user,
                      'created_at'=>$comment->created_at->diffForHumans(),

                 ]);
         }
         return $new_comments;
    }

   public function categoryPosts($slug){
       $category = Category::where('slug',$slug)->first();
       $posts = Post::where('category_id',$category->id)->with('user')->get();
       foreach($posts as $post){
        $post->setAttribute('created_at',$post->created_at->diffForHumans());
    }
       return response($posts);
   }


   public function searchpost($quary){
    $posts = Post::where('title','like','%'.$quary.'%')->with('user')->get();
    foreach($posts as $post){
     $post->setAttribute('created_at',$post->created_at->diffForHumans());
 }
    return response($posts);
}

}
