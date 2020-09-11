<?php

use App\Address;
use App\User;
use App\Post;
use App\Role;
use Illuminate\Support\Facades\Route;
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

Route::get('/post', 'PostController@getPostList');

//ONE TO ONE CRUD METHODS
//Route::get('/insert', function (){
//    $user = User::findOrFail(1);
//    $address = new Address(['name'=>'Islamabad Pakistan']);
//    $user->address()->save($address);
//});
//
//
//Route::get('/update', function(){
//    $address = Address::where('user_id', 1)->first();
//    $address->name = 'G/9 Islamabad Pakistan';
//    $address->save();
//});
//
//Route::get('/read', function(){
//    $user = User::findOrfail(1);
//    echo $user->address->name;
//
//});
//
//Route::get('/delete', function(){
//   $user = User::findOrfail(1);
//   $user->address()->delete();
//   return 'done';
//});
//ONE TO ONE END


//ONE TO MANY CRUD METHODS
//Route::get('/create', function (){
//    $user = App\User::findOrfail(1);
//    $post = new Post(['title' => 'First Post', 'body' => 'The body of first Post']);
//    $user->posts()->save($post);
//});
//
//Route::get('/read', function(){
//    $user = User::findOrFail(2);
    //    returning object
    //    return $user->posts;

    //    Die Dumping Collection
    //    dd($user->posts);

    //    Die Dumping Objects
    //    dd($user);

//    foreach($user->posts as $post){
//
//        echo $post->title;
//    }
//});
//
//Route::get('/update', function(){
//   $user = User::findOrfail(1);
//   $user->posts()->where('id', 1)->update(['title'=>'First Post', 'body'=>'First Post content']);
//});
//
//Route::get('/delete', function(){
//   $user = User::findOrfail(2);
//   $user->posts()->where('id', 2)->delete();
//});
//END ONE TO MANY


//MANY TO MANY using pivot table user_role
//Route::get('/create', function(){
//    $user = User::findOrFail(1);
//    $role = new Role(['name'=>'Administrator']);
//    $user->roles()->save($role);
//    return 'created';
//});
//
//
//Route::get('/read', function(){
//   $user = User::findOrFail(2);
//   foreach($user->roles as $role){
//       echo $role->name;
//
//    }
//});
//
//Route::get('/update', function(){
//   $user = User::findOrFail(2);
//   if($user->has('roles')){
//       foreach($user->roles as $role){
//           if($role->name == "Seller"){
//               $role->name = 'Subscriber';
//               $role->save();
//               return "done";
//           }
//       }
//   }
//});
//
//Route::get('/delete', function(){
//    $user = User::findOrFail(2);
//    foreach($user->roles as $role){
//        $role->where('id', 2)->delete();
//        return 'deleted';
//    }
//});
//
////Attach a role to user
//Route::get('/attach', function(){
//   $user = User::findOrFail(1);
//   $user->roles()->attach(4);
//   return 'attached';
//});
//
//Route::get('/detach', function(){
//   $user = User::findOrFail(1);
//   $user->roles()->detach(4);
//   return 'detached';
//});
//
//Route::get('/sync', function(){
//   $user = User::findOrFail(2);
//   $user->roles()->sync([4]);
//});
//END MANY TO MANY

