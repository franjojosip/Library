<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\BookUser;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        foreach ($users as $user) {
            $user['role'] = $user->role->name;
        }
        return view('users.home')->with('users', $users);
    }

    public function update($id)
    {
        $user = User::find($id);
        if ($user == null) {
            return redirect('/');
        }
        $roles = Role::all();
        $selected_role = $user->role_id;

        return view('users.update', compact('user', 'roles', 'selected_role'));
    }

    public function edit(UserRequest $request, $id)
    {
        $user = User::find($id);
        if ($user == null) {
            $message = Lang::get('message.error_not_exist', array('name' => $this->getUser()));
            return redirect('/publishers')->with('error', $message);
        }
        $validated = $request->validated();

        $where_matches_user = ['is_returned' => '0', 'user_id' => $id];
        $all_borowed_books = BookUser::where($where_matches_user)->get();

        if ($validated['book_limit'] < $all_borowed_books->count()) {
            throw ValidationException::withMessages([
                'book_limit' => Lang::get('message.error_cant_change_limit')
            ]);
        }

        $user->fill($validated)->save();
        $message = Lang::get('message.success_edit', array('name' => $this->getUser()));
        return redirect('/users')->with('success', $message);
    }

    public function getUser()
    {
        if (app()->getLocale() == 'hr') {
            return "Korisnik";
        }
        return "User";
    }
}
