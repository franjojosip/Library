<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookUser;
use App\Models\Genre;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'filter', 'show']);
    }

    public function index()
    {
        $question_delete = Lang::get('message.question_delete');
        $books = Book::all()->sortBy('name');
        $authors = Author::all()->sortBy('name');
        $publishers = Publisher::all()->sortBy('name');
        $genres = Genre::all()->sortBy('name');

        $authors->prepend(new Author(['id' => -1, 'name' => $this->getAuthors()]));
        $genres->prepend(new Author(['id' => -1, 'name' => $this->getGenres()]));
        $publishers->prepend(new Author(['id' => -1, 'name' => $this->getPublishers()]));

        foreach ($books as $book) {
            $where_matches = ['is_returned' => '0', 'book_id' => $book->id];
            $book_users = BookUser::where($where_matches)->get();
            if ($book_users->count() < $book->total_copies) {
                $book->is_available = true;
            }
        }
        $selected_author = null;
        $selected_genre = null;
        $selected_publisher = null;
        return view('books.home', compact('books', 'authors', 'genres', 'publishers', 'selected_author', 'selected_genre', 'selected_publisher', 'question_delete'));
    }

    public function filter(Request $request)
    {
        $query = Book::query();
        $question_delete = Lang::get('message.question_delete');

        if ($request->input('author_id') != null) {
            $query->where('author_id', '=', $request->input('author_id'));
        }
        if ($request->input('genre_id') != null) {
            $query->where('genre_id', '=', $request->input('genre_id'));
        }
        if ($request->input('publisher_id') != null) {
            $query->where('publisher_id', '=', $request->input('publisher_id'));
        }

        $books = $query->get()->sortBy('name');
        $authors = Author::all()->sortBy('name');
        $publishers = Publisher::all()->sortBy('name');
        $genres = Genre::all()->sortBy('name');

        $authors->prepend(new Author(['id' => -1, 'name' => $this->getAuthors()]));
        $genres->prepend(new Author(['id' => -1, 'name' => $this->getGenres()]));
        $publishers->prepend(new Author(['id' => -1, 'name' => $this->getPublishers()]));

        foreach ($books as $book) {
            $where_matches = ['is_returned' => '0', 'book_id' => $book->id];
            $book_users = BookUser::where($where_matches)->get();
            if ($book_users->count() < $book->total_copies) {
                $book->is_available = true;
            }
        }

        $selected_author = $request->input('author_id');
        $selected_genre = $request->input('genre_id');
        $selected_publisher = $request->input('publisher_id');
        return view('books.home', compact('books', 'authors', 'genres', 'publishers', 'selected_author', 'selected_genre', 'selected_publisher', 'question_delete'));
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
        $message = Lang::get('message.success_create', array('name' => $this->getBook()));
        return redirect('/books')->with('success', $message);
    }

    public function update($id)
    {
        $book = Book::find($id);
        if ($book == null) {
            $message = Lang::get('message.error_not_exist', array('name' => $this->getBook()));
            return redirect('/books')->with('error', $message);
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
            $message = Lang::get('message.error_not_exist', array('name' => $this->getBook()));
            return redirect('/books')->with('error', $message);
        }
        $validated = $request->validated();
        $book->fill($validated)->save();
        $message = Lang::get('message.success_edit', array('name' => $this->getBook()));
        return redirect('/books')->with('success', $message);
    }

    public function remove($id)
    {
        $book = Book::find($id);
        if ($book == null) {
            $message = Lang::get('message.error_not_exist', array('name' => $this->getBook()));
            return redirect('/books')->with('error', $message);
        }

        $borrowed_books = BookUser::where('is_returned', '0')->where('book_id', $book->id)->get();
        if ($borrowed_books->count() > 0) {
            $message = Lang::get('message.error_return_all_books');
            return redirect('/books')->with('error', $message);
        }

        $book->delete();
        $message = Lang::get('message.success_delete', array('name' => $this->getBook()));
        return redirect('/books')->with('success', $message);
    }

    public function choose($id)
    {
        $book = Book::find($id);
        if ($book == null) {
            $message = Lang::get('message.error_not_exist', array('name' => $this->getBook()));
            return redirect('/books')->with('error', $message);
        }

        $borrowed_books = BookUser::where('is_returned', '0')->where('book_id', $book->id)->get();
        if ($borrowed_books->count() == $book->total_copies) {
            $message = Lang::get('message.warning_not_available');
            return redirect('/books')->with('warning', $message);
        }

        $where_matches = ['is_returned' => '0', 'book_id' => $book->id, 'user_id' => Auth::id()];
        $book_users = BookUser::where($where_matches)->get();
        if ($book_users->count() > 0) {
            $message = Lang::get('message.warning_already_borrowed');
            return redirect('/books')->with('warning', $message);
        }

        $where_matches_user = ['is_returned' => '0', 'user_id' => Auth::id()];
        $all_borowed_books_user = BookUser::where($where_matches_user)->get();
        if ($all_borowed_books_user->count() == auth()->user()->book_limit) {
            $message = Lang::get('message.warning_max_limit', array('book_limit' => auth()->user()->book_limit));
            return redirect('/books')->with('warning', $message);
        }


        $data = ['user_id' => Auth::id(), 'book_id' => $book->id];
        BookUser::create($data);

        return redirect('/books')->with('success', Lang::get('message.success_borrow'));
    }

    public function show($id)
    {
        $book = Book::find($id);
        if ($book == null) {
            $message = Lang::get('message.error_not_exist', array('name' => $this->getBook()));
            return redirect('/books')->with('error', $message);
        }
        return view('books.show', compact('book'));
    }

    public function getBook()
    {
        if (app()->getLocale() == 'hr') {
            return "Knjiga";
        }
        return "Book";
    }

    public function getAuthors()
    {
        if (app()->getLocale() == 'hr') {
            return "Svi autori";
        }
        return "All authors";
    }
    public function getPublishers()
    {
        if (app()->getLocale() == 'hr') {
            return "Svi izdavači";
        }
        return "All publishers";
    }
    public function getGenres()
    {
        if (app()->getLocale() == 'hr') {
            return "Svi žanrovi";
        }
        return "All genres";
    }
}
