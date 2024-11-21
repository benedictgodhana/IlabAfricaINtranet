<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneDirectory extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = Phone::query();

    // Apply search filter if search query exists
    if ($request->has('search') && $request->search !== '') {
        $query->where('name', 'like', '%' . $request->search . '%')
              ->orWhere('extension', 'like', '%' . $request->search . '%');
    }

    // Apply department filter if selected
    if ($request->has('department') && $request->department !== '') {
        $query->where('department', $request->department);
    }

    // Get phones and unique departments
    $phones = $query->get();
    $departments = Phone::distinct()->pluck('department'); // Fetch all unique departments

    return view('phone.index', compact('phones', 'departments'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('phone.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'extension' => 'required|string|max:10',
        ]);

        Phone::create(array_merge($validated, ['user_id' => auth()->id()]));

        return redirect()->route('phones.index')->with('success', 'Phone entry created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Phone $phone)
    {
        return view('phone.show', compact('phone'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Phone $phone)
    {
        return view('phone.edit', compact('phone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Phone $phone)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'extension' => 'required|string|max:10',
        ]);

        $phone->update($validated);

        return redirect()->route('phones.index')->with('success', 'Phone entry updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Phone $phone)
    {
        $phone->delete();

        return redirect()->route('phones.index')->with('success', 'Phone entry deleted successfully!');
    }
}
