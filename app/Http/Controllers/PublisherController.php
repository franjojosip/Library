<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublisherRequest;
use App\Models\Publisher;

class PublisherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $publishers = Publisher::all()->sortByDesc('created_at');
        return view('publishers.home')->with('publishers', $publishers);
    }

    public function add()
    {
        return view('publishers.add');
    }

    public function create(PublisherRequest $request)
    {
        Publisher::create($request->validated());
        return redirect('/publishers')->with('success', 'Publisher successfully created!');
    }

    public function update($id)
    {
        $publisher = Publisher::find($id);
        if ($publisher == null) {
            return redirect('/publishers')->with('error', 'Publisher with given ID doesn\'t exist.');
        }
        return view('publishers.update', compact('publisher'));
    }

    public function edit(PublisherRequest $request, $id)
    {
        $publisher = Publisher::find($id);
        if ($publisher == null) {
            return redirect('/publishers')->with('error', 'Publisher with given ID doesn\'t exist.');
        }
        $validated = $request->validated();
        $publisher->fill($validated)->save();
        return redirect('/publishers')->with('success', 'Publisher successfully updated!');
    }

    public function remove($id)
    {
        $publisher = Publisher::find($id);
        if ($publisher == null) {
            return redirect('/publishers')->with('error', 'Publisher with given ID doesn\'t exist');
        } else if ($publisher->books()->count() > 0) {
            return redirect('/publishers')->with('error', 'Cannot delete, publisher is connected with some book records.');
        }
        $publisher->delete();
        return redirect('/publishers')->with('success', 'Publisher successfully deleted!');
    }
}
