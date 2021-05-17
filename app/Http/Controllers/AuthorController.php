<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Models\Author;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $authors = Author::all()->sortByDesc('created_at');
        return view('authors.home')->with('authors', $authors);
    }

    public function add()
    {
        return view('authors.add');
    }

    public function create(AuthorRequest $request)
    {
        Author::create($request->validated());
        return redirect('/authors')->with('success', 'Author successfully created!');
    }

    public function update($id)
    {
        $author = Author::find($id);
        if ($author == null) {
            return redirect('/authors')->with('error', 'Author with given ID doesn\'t exist.');
        }
        return view('authors.update', compact('author'));
    }

    public function edit(AuthorRequest $request, $id)
    {
        $author = Author::find($id);
        if ($author == null) {
            return redirect('/authors')->with('error', 'Author with given ID doesn\'t exist.');
        }
        $validated = $request->validated();
        $author->fill($validated)->save();
        return redirect('/authors')->with('success', 'Author successfully updated!');
    }

    public function remove($id)
    {
        $author = Author::find($id);
        if ($author == null) {
            return redirect('/authors')->with('error', 'Author with given ID doesn\'t exist.');
        } else if ($author->books()->count() > 0) {
            return redirect('/authors')->with('error', 'Cannot delete, author is connected with some book records.');
        }
        $author->delete();
        return redirect('/authors')->with('success', 'Author successfully deleted!');
    }
}
