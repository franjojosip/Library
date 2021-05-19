<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

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
        $books = Book::find($user_books)->sortBy('name');;
        return view('profile.show', compact('books'));
    }

    public function return($id)
    {
        $where_matches = ['user_id' => Auth::id(), 'book_id' => $id, 'is_returned' => '0'];
        $book_users = BookUser::where($where_matches)->get();
        if ($book_users->count() == 0) {
            $message = Lang::get('message.error_already_returned');
            return redirect('/profile')->with('error', $message);
        }
        $book_user = $book_users->first();
        $book_user->is_returned = '1';
        $book_user->save();
        $message = Lang::get('message.success_return');
        return redirect('/profile')->with('success', $message);
    }
}
