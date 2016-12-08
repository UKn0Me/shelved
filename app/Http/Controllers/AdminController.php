<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Groups;
use App\Tags;
use App\Bookmarks;

class AdminController extends Controller
{
    public function getDashboard()
    {
        if (Auth::user()->group_id != 1) {
            abort(404);
        }

        $tags = Tags::all();
        $bookmarks = Bookmarks::all();
        $users = User::where('active', 1)->get();

        return view('admin.index')->with([
            'tags' => $tags,
            'bookmarks' => $bookmarks,
            'users' => $users
        ]);
    }

    public function getTags()
    {
        if (Auth::user()->group_id != 1) {
            abort(404);
        }

        $tags = Tags::all();

        return view('dashboard.tags.index')
            ->with(['tags' => $tags]);
    }

    public function getBookmarks()
    {
        if (Auth::user()->group_id != 1) {
            abort(404);
        }

        $bookmarks = Bookmarks::all();

        return view('dashboard.bookmarks.index')->with([
            'bookmarks' => $bookmarks
        ]);
    }

    public function getUsers()
    {
        if (Auth::user()->group_id != 1) {
            abort(404);
        }

        $users = User::where('active', 1)->get();

        return view('admin.users/index')
            ->with(['users' => $users]);
    }

    public function postUsers(Request $request)
    {
        if ($request->deactivate = "true") {
            foreach ($request->selected as $user_id) {
                $user = User::find($user_id);
                $user->active = 0;
                $user->save();
            }
        }

        return back();
    }

    public function getUser($id)
    {
        if (Auth::user()->group_id != 1) {
            abort(404);
        }

        $user = User::find($id);
        $groups = Groups::all();

        return view('admin.users.view')->with([
            'user' => $user,
            'groups' => $groups
        ]);
    }

    public function postUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->group_id = $request->group;
        $user->save();

        return redirect()->route('users');
    }

    public function getNewUser()
    {
        if (Auth::user()->group_id != 1) {
            abort(404);
        }

        $groups = Groups::all();

        return view('admin.users.new')->with([
            'groups' => $groups
        ]);
    }

    public function postNewUser(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->group_id = $request->group;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('users');
    }
}
