<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Carbon\Carbon;
class FrontendController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('active', 1)->orderby('id','desc')->paginate(4);
        return view('frontend.blog', compact('blogs'));
    }

    public function show($url)
    {
        $blog = Blog::where('url',$url)->first();
        return view('frontend.blogdetail', compact('blog'));
    }

}
