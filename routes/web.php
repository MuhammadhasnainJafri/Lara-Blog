<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Others;
use App\Http\Controllers\CommentController;



// Auth::routes(['verify' => false, 'reset' => false]);
Route::view('AboutUs','About')->name('AboutUs');
Route::view('ContactUs','ContactUs')->name('ContactUs');
Route::post('ContactUs', [Others::class,'ContactUs']);
Route::get('contactmessages',[Others::class,'index'])->name('contactmessages');
Route::get('contactus/{contactus}',[Others::class,'show'])->name('contactus.show');
Route::delete('contactus/{contactus}',[Others::class,'destroy'])->name('user.contactus.destroy');

Route::get('user/slides',[PostController::class,'slide'])->name('slides.show');

// Route::get('checking',[PostController::class,'checking']);

Route::get('user/slide/{slide}/edit', [PostController::class,'editslide'])->name('user.slide.edit');
Route::patch('user/posts/{slide}', [PostController::class,'slideupdate'])->name('user.slide.update');


// Route::get('slides/{slides}',[PostController::class,'slideEdit'])->name('slides.edit');
// Route::post('slides/{slides}',[PostController::class,'slideEdit'])->name('slides.edit');
Route::get('/', [PostController::class,'index']);
Route::get('search', [PostController::class,'search'])->name('search');
Route::get('posts/{post}', [PostController::class,'show']);
Route::post('posts/{post}/comment', [PostController::class,'comment']);


// Route::get('ContactUs', [PostController::class,'comment']);
// Route::get('search', 'PostController@search');
Route::get('posts/{post}', [PostController::class,'show'])->name('posts.show');
Route::get('NewsApi', [PostController::class,'NewsApi'])->name('NewsApi.show');
Route::get('TopHeadlines/{type?}', [PostController::class,'TopHeadlines'])->name('TopHeadlines.show');

Route::get('user/{user_id}/post', [PostController::class,'userPost'])->name('user.posts.show');

Route::post('posts/{post}/comment', [PostController::class,'comment'])->name('post.comment');
Route::get('categories/{category}', [CategoryController::class,'index'])->name('category.post');

// // Authenticated User Routes
Route::get('dashboard', [UserController::class,'dashboard'])->name('dashboard');
Route::get('user/profile', [UserController::class,'profile'])->name('profile');
Route::get('user/posts', [UserController::class,'posts'])->name('user.posts');

Route::get('user/posts/create', [PostController::class,'create'])->name('user.posts.create');
Route::post('user/posts/create', [PostController::class,'store'])->name('user.posts.store');

Route::get('user/posts/{post}/edit', [PostController::class,'edit'])->name('user.posts.edit');
Route::patch('user/post/{post}', [PostController::class,'update'])->name('user.posts.update');

Route::delete('user/posts/{post}', [PostController::class,'destroy'])->name('user.posts.destroy');

Route::get('user/categories', [UserController::class,'categories'])->name('user.categories');

Route::get('user/categories/create', [CategoryController::class,'create'])->name('user.categories.create');
Route::post('user/categories/create', [CategoryController::class,'store'])->name('user.categories.store');

Route::get('user/categories/{category}/edit', [CategoryController::class,'edit'])->name('user.categories.edit');
Route::patch('user/categories/{category}', [CategoryController::class,'update'])->name('user.categories.update');

Route::delete('user/categories/{category}', [CategoryController::class,'destroy'])->name('user.categories.destroy');

Route::get('user/comments', [UserController::class,'comments'])->name('user.comments');

Route::delete('user/comments/{comment}', [CommentController::class,'destroy'])->name('user.comments.destroy');

Route::get('comment/create', [PostController::class,'CreateComment'])->name('comment.create');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
