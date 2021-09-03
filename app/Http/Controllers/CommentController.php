<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Comment;
use App\Notifications\NewCommentPosted;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;




class CommentController extends Controller
{
    public function store(Request $request,Blog $blog)
    {
        request()->validate([
            'content' =>'required|min:5'
        ]);
        $comment = new Comment();
        $comment->content = request('content');
        $comment->user_id = auth()->user()->id;



        $blog->comments()->save($comment);

        //notification
        $blog->user->notify(new NewCommentPosted($blog,auth()->user()));
        return redirect()->route('front.blogshow',$blog->url);

    }
    public function storeCommentReply(Comment $comment)
    {
        request()->validate([
            'repleyComment' => 'required|min:5'
        ]);
        $commentReply = new Comment();
        $commentReply->content = request('repleyComment');
        $commentReply->user_id = auth()->user()->id;

        $comment->comments()->create($commentReply);

        return redirect()->back();



    }


}
