<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackendController extends Controller
{
    public function userdashborad()
    {
        return view('userpanel.dashboard');
    }


    public function createBlog()
    {

        $categories = Category::all();
        $tags = Tag::all();
        return view('userpanel.createblog', compact('categories', 'tags'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $active = $request->active == 'on' ? '1' : '0';


        $this->validateBlog($request);
        $uploadedimage = $request->file('image');
        $imagewithname = $uploadedimage->getClientOriginalName();
        $imagename = pathinfo($imagewithname, PATHINFO_FILENAME);
        $imageextenson = $uploadedimage->getClientOriginalExtension();
        $image = $imagename . time() . '.' . $imageextenson;
        $request->image->move(public_path('/images/blogImages'), $image);

        $blog = Blog::create([
            'user_id' => $user->id,
            'category_id' => $request->category,
            'title' => $request->title,
            'url' => $request->url,
            'image' => $image,
            'image_alt' => $request->image_alt,
            'text' => $request->text,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'active' => $active,
        ]);

        $blog->tags()->attach($request->tags);


    }
}
