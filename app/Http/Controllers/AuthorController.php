<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use Illuminate\Support\Facades\Lang;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index()
    {
        $question_delete = Lang::get('message.question_delete');
        $authors = Author::all()->sortBy('name');
        return view('authors.home', compact('authors','question_delete'));
    }

    public function add()
    {
        return view('authors.add');
    }

    public function create(AuthorRequest $request)
    {
        Author::create($request->validated());
        $message = Lang::get('message.success_create', array('name' => $this->getAuthor()));
        return redirect('/authors')->with('success', $message);
    }

    public function update($id)
    {
        $author = Author::find($id);
        if ($author == null) {
            $message = Lang::get('message.error_not_exist', array('name' => $this->getAuthor()));
            return redirect('/authors')->with('error', $message);
        }
        return view('authors.update', compact('author'));
    }

    public function edit(AuthorRequest $request, $id)
    {
        $author = Author::find($id);
        if ($author == null) {
            $message = Lang::get('message.error_not_exist', array('name' => $this->getAuthor()));
            return redirect('/authors')->with('error', $message);
        }
        $validated = $request->validated();
        $author->fill($validated)->save();
        $message = Lang::get('message.success_edit', array('name' => $this->getAuthor()));
        return redirect('/authors')->with('success', $message);
    }

    public function remove($id)
    {
        $author = Author::find($id);
        if ($author == null) {
            $message = Lang::get('message.error_not_exist', array('name' => $this->getAuthor()));
            return redirect('/authors')->with('error', $message);
        } else if ($author->books()->count() > 0) {
            $message = Lang::get('message.error_cant_delete', array('name' => $this->getAuthor()));
            return redirect('/authors')->with('error', $message);
        }
        $author->delete();
        $message = Lang::get('message.success_delete', array('name' => $this->getAuthor()));
        return redirect('/authors')->with('success', $message);
    }

    public function getAuthor()
    {
        if (app()->getLocale() == 'hr') {
            return "Autor";
        }
        return "Author";
    }
}
