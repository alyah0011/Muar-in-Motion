<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;

class BookmarkController extends Controller
{
    public function index()
    {
        $bookmarks = Bookmark::where('user_id', auth()->id())->get();
        // dd($bookmarks); 
        
        return view('bookmark', ['bookmarks' => $bookmarks]);
    }

    public function bookmark(Request $request)
    {   
        if (!auth()->check()) {
            // Redirect to the login page
            return redirect()->route('login');
        }

        try {
            // Validate the request, you may need to customize this based on your needs
            $request->validate([
                'attraction_id' => 'required|exists:attractions,att_id',
            ]);

            // Check if the user has already bookmarked the attraction
            $bookmark = Bookmark::where('user_id', auth()->id())
                ->where('att_id', $request->attraction_id)
                ->first();

            // Toggle bookmark status
            if ($bookmark) {
                $bookmark->delete();
                $bookmarked = false;
            } else {
                // Create a new bookmark
                Bookmark::create([
                    'user_id' => auth()->id(),
                    'att_id' => $request->attraction_id,
                    'is_favourite' => true, 
                ]);
                $bookmarked = true;
            }

            return response()->json(['bookmarked' => $bookmarked]);
        } catch (\Exception $e) {
            \Log::error($e);
        
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Unbookmark an attraction.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function unbookmark(Request $request)
    {
        try {
            // Validate the request, you may need to customize this based on your needs
            $request->validate([
                'attraction_id' => 'required|exists:attractions,att_id',
            ]);

            // Check if the user has already bookmarked the attraction
            $bookmark = Bookmark::where('user_id', auth()->id())
                ->where('att_id', $request->attraction_id)
                ->first();

            // If bookmark exists, delete it
            if ($bookmark) {
                $bookmark->delete();
            }

            return response()->json(['bookmarked' => false]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred.'], 500);
        }
    }
}
