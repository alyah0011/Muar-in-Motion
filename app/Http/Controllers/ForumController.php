<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Forum;
use App\Models\Comment;
use App\Post; 

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // ForumController.php
    public function index()
    {
        $forums = Forum::with('comments')
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('forum', compact('forums'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'content' => 'required|string|max:255',
            'attachment' => 'nullable|file|max:2048|mimes:jpeg,png,pdf,docx',
        ]);

        // Handle form data (save to the database)
        $forum = new Forum();
        $forum->content = $request->input('content');

        $forum->user_id = Auth::id();
        
        if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment');
            $filename = time() . '_' . $attachment->getClientOriginalName();
            $attachment->storeAs('attachments', $filename, 'public');
            $forum->attachment = $filename;
        }

        $forum->save();

        // Redirect back to the forum page with a success message
        return redirect('/forum')->with('success', 'Post created successfully!');
    }

    public function like($id)
    {
        try {
            $forum = Forum::findOrFail($id);

            // Toggle like status
            $user = auth()->user();
            if ($forum->users()->where('user_id', $user->id)->exists()) {
                $forum->decrement('like_amount');
                $forum->users()->detach($user->id);
            } else {
                $forum->increment('like_amount');
                $forum->users()->attach($user->id);
            }

            // Return updated like amount
            return response()->json(['like_amount' => $forum->like_amount]);
        } catch (\Exception $e) {
            // Log the exception
            \Log::error($e);

            // Return an error response
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function comment(Request $request, Forum $forum)
    {
        // Validate the request data
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        // Create a new comment for the forum
        $comment = new Comment([
            'content' => $request->input('comment'),
        ]);

        // Associate the comment with the forum and the authenticated user
        $comment->forum()->associate($forum);
        $comment->user()->associate(auth()->user()); // Assuming you have a User model and a relationship set up

        // Save the comment
        $comment->save();

        // You can redirect back to the forum or do any other response logic
        return redirect()->route('forum.index')->with('success', 'Comment added successfully');
    }




    
}
