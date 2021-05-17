<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookUser;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $where_matches = ['user_id' => Auth::id(), 'is_returned' => '0'];
        $user_books = BookUser::where($where_matches)->get()->pluck('book_id');
        $books = Book::find($user_books);
        return view('profile.show', compact('books'));
    }

    public function return($id)
    {
        $where_matches = ['user_id' => Auth::id(), 'book_id' => $id, 'is_returned' => '0'];
        $book_users = BookUser::where($where_matches)->get();
        if ($book_users->count() == 0) {
            return redirect('/profile')->with('error', 'Book with given ID doesn\'t exist or it is already returned.');
        }
        $book_user = $book_users->first();
        $book_user->is_returned = '1';
        $book_user->save();
        return redirect('/profile')->with('success', 'Book successfully returned!');
    }
}
