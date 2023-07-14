<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RestorController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpKernel\Profiler\Profile;
use App\Http\Controllers\LaraController;
use App\Models\Emp;
use App\Models\Video;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ** SIMPLE ROUTE
// Route::get('/', function () {
//     return view('welcome');
// });

// ** PARAMETERIZE ROUTE
// Route::get('/greeting',function(){
//     return "Hello";
// });

// Route::get('/greeting/{id}',function($id){
//     return "User id is " .$id;
// });

// Route::get('test/{name?}',function(){
//     return "Test ";
// });

// Route::get('user/{name}',function($name){
//     return "Test ";
// })->where('name','[A-Za-z]+');

// **OPTIONAL PARAMETER
// Route::get('user/{id}/{name}',function($id){
//     return "Test ";
// })->where(['id','[0-9]+','name' =>'[A-Z]+']);

// Route::get('/',function(){
//     return "Home";
// });

//  **AUTOMATICALLY REDIRECT
// Route::redirect('/', 'login');

// Route::get('login', function () {
//      return '<a href="/about">About</a>';
// });

// Route::get('/about', function(){
//     return "About Page";
// });

// there are three type of return
// 1.compact
// Route::get('greeting', function () {
//        $name ='jay';
//      return view('./greeting',compact('name'));
// });

// 2.array
// Route::get('greeting', function () {
//     $name ='jay';
//   return view('./greeting',['name'=>$name]);
// });

// 3.with
// Route::get('greeting', function () {
//     $name ='jay';
//   return view('./greeting')->with('name',$name);
// });

// 4.Facades
// Route::get('greeting', function () {
//     $name ='jay';

// return View::make('greeting',['name'=>$name]);
// });
// Route::view('jay','greeting');

// Nasted blade
// Route::get('/test',function(){
//     return view('admin.profile');
// });

// Route::get('/test',function(){
//     return view('layouts.master');
// });
// Route::view('user','user');
// Route::view('post','post');

// Route::get('users',[UserController::class,'index']);

// // Parameterize Route
// Route::get('user/show/{id}',[UserController::class, 'show']);

// Route::resource('posts',UserController::class);

// Route::get('/connection',function(){
//     try{
//        DB::connection()->getPdo();
//        return'Connection is successfully';

//     }
//     catch(\Exception $ex)
//     {
//       dd($ex->getMessage());
//     }
// });

// Route::get('test',function(){
// Post::create([
//     'name'=>'PHP 10',
//     'description'=>'This my first PHP project',
//     'is_publish'=>false,
//     'is_Active'=>false
// ]);
//     return 'Inserted successfully';
// });
//    $posts = Post::where(['name' => 'laravel 9', 'description' => 'This is my first Laravel project'])->get();
//    if(! $posts){
//     return 'Post is not found';
//    }
//    return $posts;

//     return 'Inserted successfully';

// $posts = Post::find(4);
// if(! $posts){
//    return'Post not Found';
// }
// // DB::table('posts')->update(['name'=>'Laravel 10.1.1']);
// $posts->update([
//    'name'=>'laravel10.1.2'
// ]);

// return'Updated successfully';

// $posts = Post::find(3);
// if(! $posts){
//     return 'Post not found';
// }else{
//     $posts->delete();
//     return 'Deleted Successfully';

// }


// });

// Route::get('posts', [PostController::class, 'index']);
// Route::get('posts/store', [PostController::class, 'store']);
// Route::get('posts/update', [PostController::class, 'update']);
// Route::get('posts/destroy', [PostController::class, 'destroy']);

// Route::get('/admin/test11', function () {
//    return 'test11';
// })->name('jay');
// Route::get('/test2', function () {
//     return 'test2';
// });


// Route::get('test',function(request $request){
//     request()->flash('login','You are loggedin');
//     // Session::flush();

//     if(session::has('login')){
//       return 'session set';
//     }
//     else{
//         return 'session not set';
//     }


// });




Route::resource('posts', PostController::class);
// Route::get('post/soft-delete/{id}', [PostController::class, 'softDelete'])->name('posts.soft-delete');

// Route::get('get/posts',[PostController::class,'getPosts'])->name('get.posts');


Route::get('test', function () {
    // $user = User::first();
    // return $user->post;

    // $post = Post::first();
    // return $post->user;

    // $user = User::first();
    // return $user->post;

    // $post =Post::first();
    // return $post->user;

    // $user =User::first();
    // return $user->posts;

    // $user = User::first();
    // return $user->postComment;

    // $user = User::first();
    // $role = Role::first();

    // return $user->roles()->attach($role);

    // $user->roles()->detach($role);

    // $role->users()->attach($user->user_id);

    // return $user->roles;

    // $user = User::first();

    // $user->roles()->attach([6,7,8]);

    // $user->roles()->detach([6,7]);

    // $user->roles()->sync($role);

    // return 'attached';

     $user = User::first();
     return $user->tags;

});


