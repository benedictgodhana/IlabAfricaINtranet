<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Display a listing of the comments for a specific notice
    public function index($noticeId)
    {
        $comments = Comment::where('notice_id', $noticeId)->get();
        return response()->json($comments);
    }

   // Store a newly created comment in storage
public function store(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'name' => 'required|string|max:255',               // Name is required
        'email' => 'nullable|email|max:255',                // Email is optional, but must be a valid email format if provided
        'comment' => 'required|string',                      // Comment is required
        'notice_id' => 'required|exists:notices,id',       // Notice ID must exist in the notices table
    ]);

    // Create a new comment using the validated data
    $comment = Comment::create([
        'name' => $request->name,
        'email' => $request->email,                        // Email can be null
        'comment' => $request->comment,                    // Assuming the comment content is stored under 'content'
        'notice_id' => $request->notice_id,                // Store the ID of the notice being commented on
    ]);

    // Redirect back to the notice page with a success message (optional)
    return redirect()->route('notice.show', $request->notice_id)->with('success', 'Comment added successfully!');
}


    // Display the specified comment (optional)
    public function show($id)
    {
        $comment = Comment::findOrFail($id);
        return response()->json($comment);
    }

    // Update the specified comment in storage (optional)
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|max:255',
            'email' => 'nullable|email|max:255',
            'comment' => 'string',
        ]);

        $comment = Comment::findOrFail($id);
        $comment->update($request->all());
        return response()->json($comment);
    }

    // Remove the specified comment from storage (optional)
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return response()->json(null, 204);
    }
}
