<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;
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

Route::get('/', function () {
    return view('welcome');
});

//__ inserting data __//
Route::get('/create', function (){
    $user = User::findOrFail(1);
    $post = new Post(['title'=>'My first post title with mazharul islam','body'=>'I love laravel, with mi piyash']);
    $user->posts()->save($post);

});

//__ reading data __//
Route::get('/read', function (){
    $user = User::findOrFail(1);
    //return response()->json($user->posts);
    foreach ($user->posts as $post){
        echo $post->title . "<br> ";
    }
});

Route::get('/update', function (){
   $user = User::Find(1);
   $user->posts()->where('id','=', 2)->update(['title'=>' I love laravel & php ','body'=>'this is awesome, thank you mi piyash 2']);
});
