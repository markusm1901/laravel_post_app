<?php
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use App\Models\Publication;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;

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
$publications = Publication::all();
// $publications[0]->title = 'nowy tyuasddasdadasdl';
// $publications[0]->save();
// $pub = new Publication();
// $pub->title = 'nowy tyul';
// $pub->content = 'nowy tyul';
// $pub->author = 'nowy tyul';
// $pub->save();

// dd($publications);

Route::get('/home', [SiteController::class,'home'])->name("home");

Route::post('post', [PublicationController::class, 'store'])->name('posts.store');
Route::get('/posts',[PublicationController::class,'index'])->name("posts");
Route::get('post/create', [PublicationController::class, 'create'])->name('form.create')->middleware('auth');
Route::get('/post/{publication}', [PublicationController::class,'show'])->name('post');

Route::get('login',[LoginController::class,'index'])->name('login');
Route::post('login',[LoginController::class,'login'])->name('auth.login');
Route::post('logout',[LoginController::class,'logout'])->name('auth.logout');

Route::post('post/{publication}/comment', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');
Route::delete('post/comment/{comment}', [CommentController::class, 'destroy'])->name('comments.delete');

Route::get('post/{publication}/edit', [PublicationController::class, 'edit'])->name('posts.edit')->middleware('auth');
Route::post('post/{publication}', [PublicationController::class, 'update'])->name('posts.update');
Route::delete('post/{publication}', [PublicationController::class, 'destroy'])->name('posts-delete');
Route::get('/help',[SiteController::class,'help'])->name('welcome');
// Route::get('/post/title/{title}', function (string $title) {
//     $pub = Publication::where('title', $title)->firstOrFail();

//     return view('post', ['post' => $pub]);
// })->name('post');
