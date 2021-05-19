<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublisherRequest;
use App\Models\Publisher;
use Illuminate\Support\Facades\Lang;

class PublisherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index()
    {
        $question_delete = Lang::get('message.question_delete');
        $publishers = Publisher::all()->sortBy('name');
        return view('publishers.home', compact('publishers', 'question_delete'));
    }

    public function add()
    {
        return view('publishers.add');
    }

    public function create(PublisherRequest $request)
    {
        Publisher::create($request->validated());
        $message = Lang::get('message.success_create', array('name' => $this->getPublisher()));
        return redirect('/publishers')->with('success', $message);
    }

    public function update($id)
    {
        $publisher = Publisher::find($id);
        if ($publisher == null) {
            $message = Lang::get('message.error_not_exist', array('name' => $this->getPublisher()));
            return redirect('/publishers')->with('error', $message);
        }
        return view('publishers.update', compact('publisher'));
    }

    public function edit(PublisherRequest $request, $id)
    {
        $publisher = Publisher::find($id);
        if ($publisher == null) {
            $message = Lang::get('message.error_not_exist', array('name' => $this->getPublisher()));
            return redirect('/publishers')->with('error', $message);
        }
        $validated = $request->validated();
        $publisher->fill($validated)->save();
        $message = Lang::get('message.success_edit', array('name' => $this->getPublisher()));
        return redirect('/publishers')->with('success', $message);
    }

    public function remove($id)
    {
        $publisher = Publisher::find($id);
        if ($publisher == null) {
            $message = Lang::get('message.error_not_exist', array('name' => $this->getPublisher()));
            return redirect('/publishers')->with('error', $message);
        } else if ($publisher->books()->count() > 0) {
            $message = Lang::get('message.error_cant_delete', array('name' => $this->getPublisher()));
            return redirect('/publishers')->with('error', $message);
        }
        $publisher->delete();
        $message = Lang::get('message.success_delete', array('name' => $this->getPublisher()));
        return redirect('/publishers')->with('success', $message);
    }

    public function getPublisher()
    {
        if (app()->getLocale() == 'hr') {
            return "Izdavač";
        }
        return "Publisher";
    }
}
