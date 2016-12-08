<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Tags;
use App\Bookmarks;

class DashController extends Controller
{
    public function getDashboard()
    {
        $tags = Tags::where('user_id', Auth::id())->get();
        $bookmarks = Bookmarks::where('user_id', Auth::id())->get();

        return view('dashboard.index')->with([
            'tags' => $tags,
            'bookmarks' => $bookmarks
        ]);
    }

    public function getTags()
    {
        $tags = Tags::where('user_id', Auth::id())->get();

        return view('dashboard.tags.index')
            ->with(['tags' => $tags]);
    }

    public function postTags(Request $request)
    {
        if ($request->delete = "true") {
            // Reset the tag IDs of bookmarks within deleted tags
            foreach ($request->selected as $tag_id) {
                $bookmarks = Bookmarks::where('tag_id', $tag_id)->get();

                foreach ($bookmarks as $bookmark) {
                    $bookmark->tag_id = NULL;
                    $bookmark->save();
                }
            }

            // Delete the selected tags
            Tags::destroy($request->selected);
        }

        return back();
    }

    public function getTag($id)
    {
        $tag = Tags::find($id);
        $bookmarks = Bookmarks::where('tag_id', $id)->get();

        if ($tag->user_id != Auth::id() && Auth::user()->group_id != 1) {
            abort(404);
        }

        return view('dashboard.tags.view')->with([
            'tag' => $tag,
            'bookmarks' => $bookmarks
        ]);
    }

    public function postTag(Request $request, $id)
    {
        if ($request->delete = "true") {
            // Delete the selected tags
            Bookmarks::destroy($request->selected);

            return back();
        }

        $tag = Tags::find($id);
        $tag->name = $request->name;
        $tag->description = $request->description;
        $tag->save();

        return redirect()->route('tags');
    }

    public function getNewTag()
    {
        return view('dashboard.tags.new');
    }

    public function postNewTag(Request $request)
    {
        $tag = new Tags;
        $tag->name = $request->name;
        $tag->description = $request->description;
        $tag->user_id = Auth::id();
        $tag->save();

        return redirect()->route('tags');
    }

    public function getBookmarks()
    {
        $bookmarks = Bookmarks::where('user_id', Auth::id())->get();

        return view('dashboard.bookmarks.index')->with([
            'bookmarks' => $bookmarks
        ]);
    }

    public function postBookmarks(Request $request)
    {
        if ($request->delete = "true") {
            // Delete the selected tags
            Bookmarks::destroy($request->selected);
        }

        return back();
    }

    public function getBookmark($id)
    {
        $bookmark = Bookmarks::find($id);
        $tags = Tags::where('user_id', Auth::id())->get();

        if ($bookmark->user_id != Auth::id() && Auth::user()->group_id != 1) {
            abort(404);
        }

        return view('dashboard.bookmarks.view')->with([
            'bookmark' => $bookmark,
            'tags' => $tags
        ]);
    }

    public function postBookmark(Request $request, $id)
    {
        $bookmark = Bookmarks::find($id);
        $bookmark->name = $request->name;
        $bookmark->url = $request->url;
        $bookmark->tag_id = $request->tagged;
        $bookmark->description = $request->description;
        $bookmark->save();

        return redirect()->route('bookmarks');
    }

    public function getNewBookmark()
    {
        $tags = Tags::where('user_id', Auth::id())->get();

        return view('dashboard.bookmarks.new')->with([
            'tags' => $tags
        ]);
    }

    public function postNewBookmark(Request $request)
    {
        $bookmark = new Bookmarks;
        $bookmark->name = $request->name;
        $bookmark->url = $request->url;
        $bookmark->user_id = Auth::id();
        $bookmark->tag_id = $request->tagged;
        $bookmark->description = $request->description;
        $bookmark->save();

        return redirect()->route('bookmarks');
    }
}
