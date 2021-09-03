<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Blog;
use App\Tag;

use App\Role;

use App\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
  //  return view('welcome');
//});
//testing

Route::get('/AwaitingApprovelBlogs','BlogController@AwaitingApproval')->name('blogs.approve');

//------------------------------------
//faceboooklogin
Route::get('/redirect/{service}','SocialController@redirect');
Route::get('/callback/{service}','SocialController@callback');


Auth::routes(['verify'=>true]);

//Google Login
Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class,'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class,'handleGoogleCallback']);

//Facebook login
Route::get('login/Facebook', [App\Http\Controllers\Auth\LoginController::class,'redirectToFacebook'])->name('login.facebook');
Route::get('login/Facebook/callback', [App\Http\Controllers\Auth\LoginController::class,'handleFacebookCallback']);


//frontend

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get ('/master',function (){
    return view('frontend.layout.master');
});

Route::get('/','FrontendController@index')->name('front.blog');
Route::get('/blog/{url}','FrontendController@show')->name('front.blogshow');


Route::get ('/about',function (){
    return view('frontend.about');
});
Route::get ('/contact',function (){
    return view('frontend.contact');
});

//------1
//Backend
Route::group(['middleware' => 'auth'],function () {

    //user DaShBoard
    Route::get('/user/dashboard', 'BackendController@userdashborad');
    Route::get('/user/createblog', 'BackendController@createBlog');
    Route::post('/user/createblog', 'BlogController@store');

    //Route::group(['middleware' => 'checkrole'], function () {


        Route::get('/dashboard', function () {
            return view('backend.dashboard');
        });
        //categories
        Route::get('/categories', 'CategoryController@index')->name('categories');
        Route::get('/categoriesCreate', 'CategoryController@create')->name('categories.create');
        Route::post('/categories', 'CategoryController@store')->name('categories.store');
        Route::get('/categories/edit/{id}', 'CategoryController@edit')->name('categories.edit');
        Route::post('/categories/update/{id}', 'CategoryController@update')->name('categories.update');
        Route::get('/categories/delete/{id}', 'CategoryController@destroy')->name('categories.destroy');
        //tabs
        Route::get('/tags', 'TagController@index')->name('tags');
        Route::post('/tags', 'TagController@store')->name('tags.store');
        Route::get('/tagsCreate', 'TagController@create')->name('tags.create');
        Route::get('/tags/edit/{id}', 'TagController@edit')->name('tag.edit');
        Route::post('/tags/update/{id}', 'TagController@update')->name('tag.update');
        Route::get('/tags/delete/{id}', 'TagController@destroy')->name('tag.destroy');

        //Blogs
        Route::get('/blogs', 'BlogController@index')->name('blogs');
        Route::get('/createblog', 'BlogController@create')->name('blogs.create');
        Route::post('/blogcreate', 'BlogController@store')->name('blogs.store');
        Route::get('/blogs/delete/{id}', 'BlogController@destroy')->name('blog.destroy');
        Route::get('/blogs/edit/{id}', 'BlogController@edit')->name('blog.edit');
        Route::post('/blogs/update/{id}', 'BlogController@update')->name('blog.update');
         Route::post('/blogs/update/{id}', 'BlogController@update')->name('blog.update');
         Route::get('/blogs/{blog}/approve','BlogController@Approve')->name('blog.approve');
         //Comments
        Route::post('/comments/{blog} ','CommentController@store')->name('comment.store');
        Route::post('/commentreply/{comment}','CommentController@storeCommentReply')->name('comment.storereply');
        Route::get('/showFromNotification/{blog}/{notification}','BlogController@showFromNotification')->name('blog.showfromnotfi');

    // });
});

