<?php

use App\Http\Controllers\PostsController;
use App\Models\Post;
use App\Models\User;
use App\Models\Role;
use App\Models\Country;
use App\Models\Photo;
use App\Models\Tag;
use Carbon\Carbon;





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

// Route::get('/admin/post',array('as'=>'admin.home',function(){
//     $url = route('admin.home');
// return "admin post".$url;
// }));


// Route::get('/post/{id}','\App\Http\Controllers\PostsController@index');

// Route::resource('/posts','\App\Http\Controllers\PostsController');

// Route::get('/contact','\App\Http\Controllers\PostsController@contact');

// Route::get('/show_post/{id}','\App\Http\Controllers\PostsController@show_post');


/*
|--------------------------------------------------------------------------
| Web Queries
|--------------------------------------------------------------------------
|
*/

// Route::get('/insert',function(){

//     DB::insert('insert into posts(title,body,is_admin) values(?,?,?)', ['php with laravel','php wiht laravel is the best frame work ever',2]);

// });

// Route::get('/read',function(){
//     $results = DB::select('select * from posts where id=?',[1]);
//     foreach($results as $post){
//         return $post->title;
//     }
//     // return $results;
// });

// Route::get('/update',function(){
//     $updated = DB::update('update posts set title="updated title" where id=?',[1]);
//     return $updated;
// });

// Route::get('/delete',function(){
//       $deleted =  DB::delete('delete from posts where id=?',[2]);

//       return $deleted;
// });


/*
|--------------------------------------------------------------------------
| ELOQUENT ORM
|--------------------------------------------------------------------------
|
*/

// Route::get('/read',function(){
//     $posts = Post::all();
//     foreach($posts as $post){
//         return $post->title;
//     }
// });


// Route::get('/find',function(){
//     $post = Post::find(1);
//     return $post->title;
// });

// Route::get('/findwhere',function(){
//     $posts = Post::where('id',1)->orderBy('id','desc')->take(1)->get();
//     return $posts;
// });



// Route::get('basicinsert2',function(){
//     $post = Post::find(3);

//     $post->title = "ELOQUENT TITLE---3";
//     $post->body = "Eloquent ------333";
//     $post->is_admin = 1;

//     $post->save();
// });

// Route::get('/create',function(){
//     Post::create(['title'=>'create title','body'=>'create boo00000000000000000oody','is_admin'=>0]);

// });

// Route::get('/delete',function(){

//     $post= Post::find(4);

//     $post->delete();

// });


// Route::get('/delete2',function(){
//     $post = Post::destroy(5);
// });

// Route::get('/softdelete',function(){
//     Post::find(3)->delete();
// });

// Route::get('/readsoftdelete',function(){

// //    $post = Post::withTrashed()->where('id',3)->get();
//     $post = Post::onlyTrashed()->get();

//    return $post;

// });

// Route::get('/restore',function(){

//        $post = Post::withTrashed()->where('id',3)->restore();
//         // $post = Post::onlyTrashed()->get();
    
//        return $post;
    
//     });

// Route::get('/forcedelete',function(){

  
//             $post = Post::onlyTrashed()->forcedelete();
        
//            return $post;
        
//         });
 

/*
|--------------------------------------------------------------------------
| ELOQUENT Relationship
|--------------------------------------------------------------------------
|
*/
//  1 to 1
// Route::get('/user/{id}/post',function($id){
//   return  User::find($id)->post;
// });


// Route::get('/post/{id}/user',function($id){
//     return  Post::find($id)->user->name;
//   });

// 1 to many rsh
// Route::get('/posts',function(){
//     $user = User::find(1);
//     foreach($user->posts as $post){
//         echo $post->title."<br>";
//     }
// });

// many to many rsh
// Route::get('/user/{id}/role',function($id){

//    $user = User::find($id);

//    foreach($user->roles as $role){
//     return $role->name;
//    }
// });

// accessing Intermidiate table/pivot query

// Route::get('user/{id}/pivot',function($id){

//     $user =  User::find($id);

//     foreach($user->roles as $role){
//         echo $role->pivot->created_at;
//     }

// });

//
// Route::get('user/country',function(){
//     $country = Country::find(1);

//     foreach($country->posts as $post){
//         echo $post->title;
//     }

// });


// polymorphic rsh

// Route::get('user/photos',function(){
//         $user = User::find(1);
    
//         foreach($user->photos as $photo){
//             echo $photo;
//         }
//     });

// Route::get('post/photos',function(){
//     $post = Post::find(1);

//     foreach($post->photos as $photo){
//         echo $photo;
//     }
// });

// Route::get('/photo/{id}/post',function($id){
//     return Photo::findOrFail($id)->imageable;
// });

// poly mtm rsh
// Route::get('/post/tag',function(){
//     $post = Post::findOrFail(1);
//     foreach($post->tags as $tag) {
//         echo $tag->name;
//     }
// });

// Route::get('/tag/post',function(){
//     $tag = Tag::find(2);

//     foreach($tag->posts as $post){
//         echo $post->title;
//     }
// });






/*
|--------------------------------------------------------------------------
| CRUD Application 
|--------------------------------------------------------------------------
|
*/



Route::group(['middleware'=>'web'],function(){
    
    Route::resource('posts', PostsController::class);

    Route::get('/dates',function(){

        $date = new DateTime('+1 week');

        echo $date->format('d-m-y');

        echo '<br>';

        echo Carbon::now()->diffForHumans();
    });


    Route::get('/getname',function(){


        $user = User::find(1);

        echo $user->name;

    });

    
    Route::get('/setname',function(){


        $user = User::find(1);

        $user->name = 'caccabsaa biyyaa';

        $user->save();

    });

});