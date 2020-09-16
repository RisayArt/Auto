<?php

use App\Address;
use App\Tag;
use App\User;
use App\Post;
use App\Role;
use App\Staff;
use App\Photo;
use App\Product;
use App\Video;
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


//HAS MANY

//Route::get('/create', function(){
//   $staff = Staff::findOrFail(1);
//   $staff->photos()->create(['path'=>'example.php']);
//});

//Route::get('/createp', function(){
//   $product = Product::findOrFail(1);
//   $product->photos()->create(['path' => 'product.php']);
//});


//Route::get('/read', function(){
//   $staff = Staff::findOrFail(1);
//   foreach ($staff->photos as $photo){
//       return $photo->path;
//   }
//});

//Route::get('/readp', function(){
//    $product = Product::findOrFail(1);
//    foreach ($product->photos as $photo){
//        return $photo->path;
//    }
//});


//Route::get('update', function(){
//   $staff = Staff::findOrFail(1);
//   $photo = $staff->photos()->where('id', 1)->first();
//   $photo->path = 'udated.jpg';
//   $photo->save();
//});

//Route::get('/updatee', function(){
//   $staff = Staff::findOrFail(1);
//   foreach ($staff->photos as $photo){
//       $photo->path = 'update.jpg';
//       $photo->save();
//       return 'updated';
//   }
//});

//
//Route::get('/delete', function(){
//   $staff = Staff::findOrFail(1);
//   $staff->photos()->where('id', 1)->delete();
//   return 'deleted';
//
//});
//
//Route::get('/assign', function(){
//    $staff = Staff::findOrFail(1);
//    $photo = Photo::findOrFail(2);
//    $staff->photos()->save($photo);
//});

//Route::get('unassign', function(){
//   $staff = Staff::findOrFail(1);
//   $staff->photos()->where('id', 3)->update(['imageable_id'=>'', 'imageable_type'=>'']);
//});

//Has Many ENDS


//POLYMORPHIC MANY TO MANY

Route::get('/create', function(){
   $post = Post::create(['title' => 'New Post', 'body' => 'Body of Post']);
   $tag1 = Tag::findOrFail(1);
   $post->tags()->save($tag1);

   $video = Video::create(['name' => 'abc.mov']);
   $tag2 = Tag::findOrFail(2);
   $video->tags()->save($tag2);
});


Route::get('/read', function(){
   $post = Post::findOrFail(8);
   foreach ($post->tags as $tag){
       echo $tag;
   }
});

Route::get('/update', function(){
//   $post = Post::findOrFail(8);
//   foreach ($post->tags as $tag){
//       $tag->where('id', 1)->update(['name' => 'changing']);
//       $tag->save();
//       return 'Done';
//   }
    $post = Post::findOrFail(8);
    $tag = Tag::findOrFail(2);
    $post->tags()->save($tag);
    $post->tags()->attach($tag);
    $post->tags()->sync([1]);
});

