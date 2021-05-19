<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreRequest;
use App\Models\Genre;
use Illuminate\Support\Facades\Lang;

class GenreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index()
    {
        $question_delete = Lang::get('message.question_delete');
        $genres = Genre::all()->sortBy('name');
        return view('genres.home', compact('genres', 'question_delete'));
    }

    public function add()
    {
        return view('genres.add');
    }

    public function create(GenreRequest $request)
    {
        Genre::create($request->validated());
        $message = Lang::get('message.success_create', array('name' => $this->getGenre()));
        return redirect('/genres')->with('success', $message);
    }

    public function update($id)
    {
        $genre = Genre::find($id);
        if ($genre == null) {
            $message = Lang::get('message.error_not_exist', array('name' => $this->getGenre()));
            return redirect('/genres')->with('error', $message);
        }
        return view('genres.update', compact('genre'));
    }

    public function edit(GenreRequest $request, $id)
    {
        $genre = Genre::find($id);
        if ($genre == null) {
            $message = Lang::get('message.error_not_exist', array('name' => $this->getGenre()));
            return redirect('/genres')->with('error', $message);
        }
        $validated = $request->validated();
        $genre->fill($validated)->save();
        $message = Lang::get('message.success_edit', array('name' => $this->getGenre()));
        return redirect('/genres')->with('success', $message);
    }

    public function remove($id)
    {
        $genre = Genre::find($id);
        if ($genre == null) {
            $message = Lang::get('message.error_not_exist', array('name' => $this->getGenre()));
            return redirect('/genres')->with('error', $message);
        } else if ($genre->books()->count() > 0) {
            $message = Lang::get('message.error_cant_delete', array('name' => $this->getGenre()));
            return redirect('/genres')->with('error', $message);
        }
        $genre->delete();
        $message = Lang::get('message.success_delete', array('name' => $this->getGenre()));
        return redirect('/genres')->with('success', $message);
    }

    public function getGenre()
    {
        if (app()->getLocale() == 'hr') {
            return "Žanr";
        }
        return "Genre";
    }
}
