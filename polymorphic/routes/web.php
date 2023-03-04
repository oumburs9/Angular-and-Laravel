<?php

use App\Models\Staff;
use App\Models\Photo;
use App\Models\Product;


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

    $staff = Staff::find(1);
    $staff->photos()->create(['path'=>'example1.jpg']);

});


Route::get('/read',function(){
    $staff = Staff::findOrFail(1);

    foreach($staff->photos as $photo){
        echo $photo->path.'<br>';
    }
});

Route::get('/update',function(){
    $staff = Staff::findOrFail(1);

    $photo = $staff->photos->where('id','=',2)->first();
    $photo->path = "updated.jpg";
    $photo->save();
});

Route::get('/delete',function(){
    $staff= Staff::findOrFail(1);

    $staff->photos()->whereId(2)->delete();
});


Route::get('/assign',function(){
    $staff= Staff::findOrFail(1);

    $photo = Photo::findOrFail(3);

    $staff->photos()->save($photo);
});


Route::get('/un-assign',function(){
    $staff= Staff::findOrFail(1);

    $staff->photos()->whereId(3)->update(['imageable_type'=>'','imageable_id'=>0]);
});