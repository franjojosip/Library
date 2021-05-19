<?php

use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);

    if (request()->fullUrl() === redirect()->back()->getTargetUrl()) {
        return redirect('/');
    }

    return redirect()->back();
});

Route::get('/', function () {
    $most_popular = DB::table('book_users')
        ->select('book_id', DB::raw('count(*) as total'))
        ->groupBy('book_id')
        ->take(3)
        ->get()
        ->pluck('book_id');

    $books = Book::find($most_popular);
    return view('welcome', compact('books'));
});


//For all users and guests
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/books', [App\Http\Controllers\BookController::class, 'index'])->name('books');
Route::get('/books/filter', [App\Http\Controllers\BookController::class, 'filter']);
Route::get('/books/show/{id}', [App\Http\Controllers\BookController::class, 'show']);

Route::get('/authors', [App\Http\Controllers\AuthorController::class, 'index'])->name('authors');
Route::get('/publishers', [App\Http\Controllers\PublisherController::class, 'index'])->name('publishers');
Route::get('/genres', [App\Http\Controllers\GenreController::class, 'index'])->name('genres');

Route::auth();

//For authenticated users only
Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
    Route::get('/',  [\App\Http\Controllers\ProfileController::class, 'index']);
    Route::get('/return/{id}', [\App\Http\Controllers\ProfileController::class, 'return']);
});

Route::group(['prefix' => 'books', 'as' => 'books.'], function () {
    Route::get('/choose/{id}', [\App\Http\Controllers\BookController::class, 'choose']);
});

//For authenticated admins only
Route::group(['prefix' => 'users', 'middleware' => 'role:admin', 'as' => 'users.'], function () {
    Route::get('/',  [\App\Http\Controllers\UserController::class, 'index']);
    Route::get('/update/{id}', [\App\Http\Controllers\UserController::class, 'update']);
    Route::put('/edit/{id}', [\App\Http\Controllers\UserController::class, 'edit']);
});

Route::group(['prefix' => 'books', 'middleware' => 'role:admin', 'as' => 'books.'], function () {
    Route::get('/add', [\App\Http\Controllers\BookController::class, 'add']);
    Route::post('/create', [\App\Http\Controllers\BookController::class, 'create']);
    Route::get('/update/{id}', [\App\Http\Controllers\BookController::class, 'update']);
    Route::put('/edit/{id}', [\App\Http\Controllers\BookController::class, 'edit']);
    Route::delete('/remove/{id}', [\App\Http\Controllers\BookController::class, 'remove']);
});

Route::group(['prefix' => 'authors', 'middleware' => 'role:admin', 'as' => 'authors.'], function () {
    Route::get('/add', [\App\Http\Controllers\AuthorController::class, 'add']);
    Route::post('/create', [\App\Http\Controllers\AuthorController::class, 'create']);
    Route::get('/update/{id}', [\App\Http\Controllers\AuthorController::class, 'update']);
    Route::put('/edit/{id}', [\App\Http\Controllers\AuthorController::class, 'edit']);
    Route::delete('/remove/{id}', [\App\Http\Controllers\AuthorController::class, 'remove']);
});

Route::group(['prefix' => 'publishers', 'middleware' => 'role:admin', 'as' => 'publishers.'], function () {
    Route::get('/add', [\App\Http\Controllers\PublisherController::class, 'add']);
    Route::post('/create', [\App\Http\Controllers\PublisherController::class, 'create']);
    Route::get('/update/{id}', [\App\Http\Controllers\PublisherController::class, 'update']);
    Route::put('/edit/{id}', [\App\Http\Controllers\PublisherController::class, 'edit']);
    Route::delete('/remove/{id}', [\App\Http\Controllers\PublisherController::class, 'remove']);
});

Route::group(['prefix' => 'genres', 'middleware' => 'role:admin', 'as' => 'genres.'], function () {
    Route::get('/add', [\App\Http\Controllers\GenreController::class, 'add']);
    Route::post('/create', [\App\Http\Controllers\GenreController::class, 'create']);
    Route::get('/update/{id}', [\App\Http\Controllers\GenreController::class, 'update']);
    Route::put('/edit/{id}', [\App\Http\Controllers\GenreController::class, 'edit']);
    Route::delete('/remove/{id}', [\App\Http\Controllers\GenreController::class, 'remove']);
});
