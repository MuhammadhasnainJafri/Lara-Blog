<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Auth;
class CommentController extends Controller
{
    //
    public function destroy(Comment $comment)
    {
      
        if(Auth::user()->is_admin==true)
    {        
        $comment->delete();
        session()->flash('message', 'Post deleted successfully.');

        return redirect()->back();
    }
}
    
}
