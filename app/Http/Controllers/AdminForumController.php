<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;

class AdminForumController extends Controller
{
    public function index()
    {
        $forums = Forum::all();
        return view('admin.forum', compact('forums'));
    }

    public function updateStatus(Request $request, $id)
    {
        $forum = Forum::findOrFail($id);
        $forum->status = 1; // Assuming 1 means approved, adjust as needed
        $forum->save();

        return redirect()->route('admin.forum.index')->with('success', 'Post approved successfully!');
    }

    public function destroy($id)
    {
        $forum = Forum::findOrFail($id);
        $forum->delete();

        return redirect()->route('admin.forum.index')->with('success', 'Forum deleted successfully');
    }
}
