<?php

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
use App\Models\User;
use App\Models\Address;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert',function(){
    $user = User::findOrFail(1);

    $address = new Address(['name'=>'Danbal Bale']);

    $user->Address()->save($address);
});


Route::get('/update',function(){
    $address = Address::whereUserId(1)->first();

    $address->name = 'update danbal bale';
    $address->save();
});

Route::get('/read',function(){
    $user = User::findOrFail(1);
    echo $user->address->name;
});

Route::get('/delete',function(){
    $user = User::findOrFail(1);
    $user->address()->delete();
});

