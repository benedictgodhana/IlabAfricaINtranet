<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    // Display a listing of the events
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events')); // Create a view for this
    }

    // Show the form for creating a new event
    public function create()
    {
        return view('events.create'); // Create a view for this
    }

    // Store a newly created event in storage
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'organizers' => 'required|string|max:255',
            'venue' => 'required|string|max:255',
        ]);

        Event::create([
            'title' => $request->title,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'organizers' => $request->organizers,
            'venue' => $request->venue,
            'user_id' => Auth::id(), // Store the ID of the authenticated user
        ]);

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    // Display the specified event
    public function show(Event $event)
    {
        return view('events.show', compact('event')); // Create a view for this
    }

    // Show the form for editing the specified event
    public function edit(Event $event)
    {
        return view('events.edit', compact('event')); // Create a view for this
    }

    // Update the specified event in storage
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'organizers' => 'required|string|max:255',
            'venue' => 'required|string|max:255',
        ]);

        $event->update($request->all());

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    // Remove the specified event from storage
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
