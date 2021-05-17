<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookUser;
use App\Models\Genre;
use App\Models\Publisher;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $books = Book::all()->sortByDesc('created_at');
        foreach ($books as $book) {

            $where_matches = ['is_returned' => '0', 'book_id' => $book->id];
            $book_users = BookUser::where($where_matches)->get();
            if ($book_users->count() < $book->total_copies) {
                $book->is_available = true;
            }
        }
        return view('books.home')->with('books', $books);
    }

    public function add()
    {
        $authors = Author::all()->sortBy('name');
        $publishers = Publisher::all()->sortBy('name');
        $genres = Genre::all()->sortBy('name');
        return view('books.add', compact('authors', 'publishers', 'genres'));
    }

    public function create(BookRequest $request)
    {
        Book::create($request->validated());
        return redirect('/books')->with('success', 'Book successfully created');
    }

    public function update($id)
    {
        $book = Book::find($id);
        if ($book == null) {
            return redirect('/books')->with('error', 'Book with given ID doesn\'t exist');
        }

        $authors = Author::all()->sortBy('name');
        $publishers = Publisher::all()->sortBy('name');
        $genres = Genre::all()->sortBy('name');

        $selected_genre = $book->genre_id;
        $selected_author = $book->author_id;
        $selected_publisher = $book->publisher_id;

        return view('books.update', compact('book', 'authors', 'publishers', 'genres', 'selected_genre', 'selected_author', 'selected_publisher'));
    }

    public function edit(BookRequest $request, $id)
    {
        $book = Book::find($id);
        if ($book == null) {
            return redirect('/books')->with('error', 'Book with given ID doesn\'t exist.');
        }
        $validated = $request->validated();
        $book->fill($validated)->save();
        return redirect('/books')->with('success', 'Book successfully updated!');
    }

    public function remove($id)
    {
        $book = Book::find($id);
        if ($book == null) {
            return redirect('/books')->with('error', 'Book with given ID doesn\'t exist.');
        }

        $borrowed_books = BookUser::where('is_returned', '0')->where('book_id', $book->id)->get();
        if ($borrowed_books->count() > 0) {
            return redirect('/books')->with('error', 'Cannot delete, users have to return all books before delete book from record.');
        }

        $book->delete();
        return redirect('/books')->with('success', 'Book successfully deleted!');
    }

    public function choose($id)
    {
        $book = Book::find($id);
        if ($book == null) {
            return redirect('/books')->with('error', 'Book with given ID doesn\'t exist.');
        }

        $borrowed_books = BookUser::where('is_returned', '0')->where('book_id', $book->id)->get();
        if ($borrowed_books->count() == $book->total_copies) {
            return redirect('/books')->with('warning', 'Book is not available right now.');
        }

        $where_matches = ['is_returned' => '0', 'book_id' => $book->id, 'user_id' => Auth::id()];
        $book_users = BookUser::where($where_matches)->get();
        if ($book_users->count() > 0) {
            return redirect('/books')->with('warning', 'You already borrowed this book!');
        }

        $where_matches_user = ['is_returned' => '0', 'user_id' => Auth::id()];
        $all_borowed_books_user = BookUser::where($where_matches_user)->get();
        if ($all_borowed_books_user->count() == auth()->user()->book_limit) {
            return redirect('/books')->with('warning', 'You reached maximum limit for borrowing books ' . '[' . auth()->user()->book_limit . ']. Go to your profile to see information.');
        }


        $data = ['user_id' => Auth::id(), 'book_id' => $book->id];
        BookUser::create($data);

        return redirect('/books')->with('success', 'You successfully borrowed a book!');
    }
}
