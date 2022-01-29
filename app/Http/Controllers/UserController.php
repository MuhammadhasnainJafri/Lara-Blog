<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Auth;


class UserController extends Controller
{
    //
    public function profile()
    {
        return view('user.profile');
    }

    public function dashboard()
    {
        if(Auth::user()->is_admin==true){
        
        $posts      = Post::count();
        $comments   = Comment::count();
        $categories = Category::count();

        return view('user.dashboard', get_defined_vars());
        }else{
            return redirect('/');
        }
    }

    public function posts()
    {
        if(Auth::user()->is_admin==true){
        $posts = Post::with(['user', 'category', 'comments'])
            ->paginate(10);
        }else{
            $posts = Post::with(['user', 'category', 'comments'])->where('user_id',Auth::user()->id)
            ->paginate(10);
        }

        return view('user.posts', compact('posts'));
    }

    public function categories()
    {
        if(Auth::user()->is_admin==true)
        {
       return view('user.categories');
    }else{
      return  redirect('/');
    }
}

    public function comments()
    {
        if(Auth::user()->is_admin==true){
        $comments = Comment::with(['user', 'post'])->paginate(10);
        return view('user.comments', compact('comments'));
        }else{
            return redirect('/');
        }
    }
    
}
