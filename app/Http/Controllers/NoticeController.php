<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::all(); // Fetch all notices
        return view('notices.index', compact('notices')); // Return the notices index view
    }

    public function create()
    {
        return view('notices.create'); // Return the create notice view
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validate the image
        'content' => 'required|string',
    ]);

    $notice = new Notice();
    $notice->title = $request->title;
    $notice->user_id = auth()->id(); // Set the author as the authenticated user
    $notice->date = now(); // Set the current date

    // Handle the image upload
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('notices', 'public');
        $notice->image = $imagePath;
    }

    $notice->content = $request->content;
    $notice->save();

    return redirect()->route('notices.index')->with('success', 'Notice created successfully!');
}


    public function show(Notice $notice)
    {
        return view('notices.show', compact('notice')); // Return the specific notice view
    }

    public function edit(Notice $notice)
    {
        return view('notices.edit', compact('notice')); // Return the edit notice view
    }

    public function update(Request $request, Notice $notice)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'date' => 'required|date',
        ]);

        $notice->update($request->all()); // Update the existing notice
        return redirect()->route('notices.index')->with('success', 'Notice updated successfully.');
    }

    public function destroy(Notice $notice)
    {
        $notice->delete(); // Soft delete the notice
        return redirect()->route('notices.index')->with('success', 'Notice deleted successfully.');
    }

    public function showNotice($id)
    {
        $notice = Notice::findOrFail($id);

        // Fetch comments related to the notice and paginate
        $comments = Comment::where('notice_id', $id)->paginate(2); // Adjust the number here for pagination

        return view('notice.show', compact('notice', 'comments'));
    }

}
