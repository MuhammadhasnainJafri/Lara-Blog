<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Post;
use App\Models\Category;
use App\Models\slider;
use Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    
    public function deleteFile($imageName)
    {
        $image_path = public_path("PostThumbnail/{$imageName}");
        
        if(File::exists($image_path))
        {
            File::delete($image_path);
        }
    }
    //
    function index()
    {

        $posts = Post::with('category', 'user')
            ->withCount('comments')
            ->published()
            ->paginate(6);
        $slider =slider::all();
        return view('index', compact('posts'),compact('slider'));
    }
    public function userPost($user_id)
    {
        $posts = Post::with('category', 'user')->where('user_id', $user_id)
        ->withCount('comments')
        ->published()
        ->paginate(2);
    
    return view('userpost', compact('posts'));
      
    }

    public function search(Request $request)
    {
        $this->validate($request, ['q' => 'required']);

        $query = $request->get('q');

        $posts = Post::where('title', 'like', "%{$query}%")
            ->orWhere('body', 'like', "%{$query}%")
            ->with('category', 'user')
            ->withCount('comments')
            ->published()
            ->paginate(5);
            $response = Http::get('https://newsapi.org/v2/everything?q='.$request->get('q').'&sortBy=popularity&apiKey=4f7ce0f074304a278fa41db7b691621c');
            $response=json_decode($response, true);
        
        return view('search', compact('posts','query','response'));
    }

    public function show(Post $post)
    {

        $post = $post->load(['comments.user', 'user', 'category']);
        $next=Post::where('id', '>', $post->id)->orderBy('id','asc')->first();
        $privous=Post::where('id', '<', $post->id)->orderBy('id','desc')->first();
        return view('posts',['post'=>$post,'next'=>$next,'privous'=>$privous] );
    }
    
   

    public function comment(Request $request, Post $post)
    {
        $this->validate($request, ['body' => 'required']);

        $post->comments()->create([
            'user_id'   => auth()->id(),
            'body'      => $request->body           
        ]);

        session()->flash('message', 'Comment successfully created.');

        return redirect("/posts/{$post->id}");
            
    }

    public function create()
    {
        if(Auth::guest())
        {
        return redirect('login');
    }else{
        return view('user.posts.create');
    }
}


    public function store(Request $request)
    {
        if(Auth::user())
        {
        $request->validate([
            'title'      => 'required|max:250',
            'body'       => 'required|min:50',
            'category'   => 'required|exists:categories,id',
            'publish'    => 'accepted',
            'thumbnail' =>  'image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        $imageName=$request->file('thumbnail')->getClientOriginalName();        
         if($request->file('thumbnail')->move(public_path('PostThumbnail'), $imageName))
         {

        $post = Post::create([
            'title'         => $request->title,
            'body'          => $request->body,
            'user_id'       => auth()->id(),
            'category_id'   => $request->category,
            'post_thumbnail'=> $imageName,
            'is_published'  => $request->has('publish'),
        ]);

        session()->flash('message', 'Post created successfully.');

        return redirect()->route('user.posts');
    }
}else{
    return redirect('login');
}
}

    public function edit(Post $post)
    {
        if($post->user_id != auth()->user()->id && auth()->user()->isNotAdmin()) {

            session()->flash('message', "You can't edit other peoples post.");

            return redirect()->route('user.posts');
        }

        return view('user.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'      => 'required|max:250',
            'body'       => 'required|min:50',
            'category'   => 'required|exists:categories,id',
            'thumbnail' =>  'image|mimes:jpeg,png,jpg,gif,svg'
          
        ]);
        if($request->thumbnail!=Null)
        {
        PostController::deleteFile($post->post_thumbnail);
        $imageName=$request->file('thumbnail')->getClientOriginalName();   
        $request->file('thumbnail')->move(public_path('PostThumbnail'), $imageName); 
        }else{
            $imageName = $post->post_thumbnail;
        }
            

        $post->update([
            'title'       => $request->title,
            'body'        => $request->body,
            'category_id' => $request->category,
            'is_published'  => $request->has('publish'),
            'post_thumbnail'=> $imageName,
            'is_published'  => $request->has('publish'),
        ]);

        session()->flash('message', 'Post updated successfully.');

        return redirect()->to("/posts/$post->id");
    }

    public function destroy(Post $post)
    {
        if($post->user_id != auth()->user()->id && auth()->user()->isNotAdmin()) {

            session()->flash('message', "You can't delete other peoples post.");

            return redirect()->route('user.posts');
        }
        PostController::deleteFile($post->post_thumbnail);
        $post->delete();

        session()->flash('message', 'Post deleted successfully.');

        return redirect()->route('user.posts');
    }
   
    public function slide(){
        if(Auth::user()->is_admin==true)
            {        $slides = slider::all();
        return view('user.posts.slider.slidershow',compact('slides'));
    }}

    public function editslide(slider $slide)
    {
        
        if(Auth::user()->is_admin==true)
        {
        return view('user.posts.slider.slidechange', compact('slide'));
    }}
    public function slideupdate(Request $request,slider $slide){
        if(Auth::user()->is_admin==true)
{
        $request->validate([
            'title'      => 'required|max:250',
            'thumbnail' =>  'image|mimes:jpeg,png,jpg,gif,svg'
           
        ]);
        if($request->thumbnail!=Null){
           
        $imageName=$request->file('thumbnail')->getClientOriginalName();
        PostController::deleteFile($slide->img_thumbnail);
        $request->file('thumbnail')->move(public_path('PostThumbnail'), $imageName);    
        }else{
            $imageName =    $slide->img_thumbnail;
        }    
           
        $slide->update([
            'title'       => $request->title,
            'img_thumbnail'=> $imageName
        ]);

        session()->flash('message', 'Post updated successfully.');
        return redirect()->to("/user/slides");     
    }
        
    

}

public function NewsApi(){
    
    // https://newsapi.org/v2/everything?q=Apple&from=2022-01-26&sortBy=popularity&apiKey=4f7ce0f074304a278fa41db7b691621c
    
    $response = Http::get('https://newsapi.org/v2/everything?q=programming&sortBy=popularity&apiKey=4f7ce0f074304a278fa41db7b691621c');
    $response=json_decode($response, true);
    return view('ApiNew', compact('response'));
    
}
public function TopHeadlines($type='technology'){
    
    // https://newsapi.org/v2/everything?q=Apple&from=2022-01-26&sortBy=popularity&apiKey=4f7ce0f074304a278fa41db7b691621c
    
    $response = Http::get('https://newsapi.org/v2/top-headlines?language=en&category='.$type.'&apiKey=4f7ce0f074304a278fa41db7b691621c');
    $response=json_decode($response, true);
    return view('ApiNew', compact('response'));
    // return $response;
    
}


}
