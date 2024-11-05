<?php

namespace App\Http\Controllers;

use App\Models\Birthday;
use Illuminate\Http\Request;

class BirthdayController extends Controller
{
    public function index()
    {
        $birthdays = Birthday::all(); // Fetch all birthdays
        return view('birthdays.index', compact('birthdays')); // Return the birthdays index view
    }

    public function create()
    {
        return view('birthdays.create'); // Return the create birthday view
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'birth_date' => 'required|date',
        'email' => 'required|email',
    ]);

    // Create a new birthday entry with the authenticated user's ID
    Birthday::create([
        'name' => $request->name,
        'birth_date' => $request->birth_date,
        'email' => $request->email,
        'user_id' => auth()->id(), // Get the authenticated user's ID
    ]);

    return redirect()->route('birthdays.index')->with('success', 'Birthday created successfully.');
}


    public function show(Birthday $birthday)
    {
        return view('birthdays.show', compact('birthday')); // Return the specific birthday view
    }

    public function edit(Birthday $birthday)
    {
        return view('birthdays.edit', compact('birthday')); // Return the edit birthday view
    }
    public function update(Request $request, Birthday $birthday)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'email' => 'required|email',
        ]);

        // Update the existing birthday while excluding the user_id from being updated
        $birthday->update([
            'name' => $request->name,
            'birth_date' => $request->birth_date,
            'email' => $request->email,
            // No need to include 'user_id' as it should remain unchanged
        ]);

        return redirect()->route('birthdays.index')->with('success', 'Birthday updated successfully.');
    }


    public function destroy(Birthday $birthday)
    {
        $birthday->delete(); // Soft delete the birthday
        return redirect()->route('birthdays.index')->with('success', 'Birthday deleted successfully.');
    }
}
