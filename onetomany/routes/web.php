<?php
use App\Models\User;
use App\Models\Post;

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create',function(){
    $user = User::findOrFail(1);

    $post = new Post(['title'=>'title of one to many 02','body'=>'body of one to many 02']);

    $user->posts()->save($post);
});

Route::get('/read',function() {

    $user = User::findOrFail(1);
    // dd($user->posts());
    foreach($user->posts as $post){
        echo $post->title.'<br>';
    }

});

Route::get('/update',function(){
 
    $user = User::find(1);

    // $user->posts()->where('id','=',1)->update(['title'=>'updated title 2','body'=>'updated body 2']);
    $user->posts()->whereId(1)->update(['title'=>'updated title 2','body'=>'updated body 2']);

});

Route::get('/delete',function(){
    $user = User::findOrFail(1);

    $post = $user->posts()->whereId(1)->delete();
    echo $post;
});