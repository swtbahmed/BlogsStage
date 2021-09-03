<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
 use App\User;
 use App\Blog;
 use App\Category;
 use App\Tag;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('backend.blogs',[
            'blogs'=>$blogs
        ]);    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $categories = Category::all();
        $tags = Tag::all();
        return  view('backend.createblog',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $active = $request->active == 'on' ? '1' :'0';



        $this->validateBlog($request);
        $uploadedimage = $request->file('image');
        $imagewithname = $uploadedimage->getClientOriginalName();
        $imagename = pathinfo($imagewithname, PATHINFO_FILENAME);
        $imageextenson = $uploadedimage->getClientOriginalExtension();
        $image = $imagename . time() . '.' . $imageextenson;
        $request->image->move(public_path('/images/blogImages'), $image);

        $blog =  Blog::create([
            'user_id' => $user->id,
            'category_id'=>$request->category,
            'title'=>$request->title,
            'url'=>$request->url,
            'image'=>$image,
            'image_alt'=>$request->image_alt,
            'text'=>$request->text,
            'short_description'=>$request->short_description,
            'description'=>$request->description,
            'active'=>$active,
        ]);

        $blog->tags()->attach($request->tags);


        return redirect()->back()->with('success','successful');

    }

    public function validateBlog($request)
    {

        $request->validate([
            'title' =>'required|min:3|max:255',
            'url' =>'required|min:3|max:255|unique:blogs',
            'category' =>'required',
            'tags' =>'required',
            'image' =>'required|mimes:jpeg,png,bmp,gif|max:2000',
            'image_alt' =>'required|min:3|max:255',
            'text' =>'required|min:3|max:255',
            'short_description' =>'required|min:3|max:500',
            'description' =>'required|min:10',
        ]);
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $blog =   DB::table('blogs')->where('id',$id) ->first();
        return view('backend.EditBlog',compact('blog','categories','tags'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DB::table('blogs')->where('id',$id)->first();
        $blog = DB::table('blogs')->where('id',$id)->delete();
        return redirect(url('blogs'));
    }






    public function AwaitingApproval()
    {
        $blogs = Blog::where('active',0)->get();
        return view('backend.Awaitingblogs',compact('blogs'));
    }
    public function Approve(Blog $blog)
    {
        $blog->update(['active'=> 1]);
        return redirect()->back();


    }
    public function showFromNotification(Blog $blog,DatabaseNotification $notification)
    {
        $notification->markAsRead();


        return view('frontend.blogdetail', compact('blog'));    }
}
