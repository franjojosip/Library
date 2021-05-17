<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreRequest;
use App\Models\Genre;

class GenreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $genres = Genre::all()->sortByDesc('created_at');
        return view('genres.home')->with('genres', $genres);
    }

    public function add()
    {
        return view('genres.add');
    }

    public function create(GenreRequest $request)
    {
        Genre::create($request->validated());
        return redirect('/genres')->with('success', 'Genre successfully created!');
    }

    public function update($id)
    {
        $genre = Genre::find($id);
        if ($genre == null) {
            return redirect('/genres')->with('error', 'Genre with given ID doesn\'t exist.');
        }
        return view('genres.update', compact('genre'));
    }

    public function edit(GenreRequest $request, $id)
    {
        $genre = Genre::find($id);
        if ($genre == null) {
            return redirect('/genres')->with('error', 'Genre with given ID doesn\'t exist.');
        }
        $validated = $request->validated();
        $genre->fill($validated)->save();
        return redirect('/genres')->with('success', 'Genre successfully updated!');
    }

    public function remove($id)
    {
        $genre = Genre::find($id);
        if ($genre == null) {
            return redirect('/genres')->with('error', 'Genre with given ID doesn\'t exist');
        } else if ($genre->books()->count() > 0) {
            return redirect('/genres')->with('error', 'Cannot delete, genre is connected with some book records.');
        }
        $genre->delete();
        return redirect('/genres')->with('success', 'Genre successfully deleted!');
    }
}
