<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport; // Create this export class for Excel
use Barryvdh\DomPDF\Facade as PDF; // Import the PDF facade

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch users and return the view
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create'); // Return a view for creating a new user
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        try {
            // Create a new user with validated data
            User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
                'added_by' => auth()->user()->name, // Capture the authenticated user's name
            ]);

            // Redirect to users index with success message
            return redirect()->route('users.index')->with('success', 'User created successfully!');
        } catch (\Exception $e) {
            // Log the error message for debugging
            \Log::error('User Creation Error: ' . $e->getMessage());

            // Redirect back with error message
            return redirect()->back()->with('error', 'Failed to add user: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user')); // Return a view for showing user details
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $user = User::findOrFail($id);

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $id,
                'password' => 'nullable|string|min:8',
            ]);

            $updateData = [
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
            ];

            if (!empty($validatedData['password'])) {
                $updateData['password'] = bcrypt($validatedData['password']);
            }

            $user->update($updateData);

            return redirect()->route('users.index')->with('success', 'User Updated successfully!');
        } catch (\Exception $e) {
            \Log::error('User Update Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update user: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }

    /**
     * Export users to an Excel file.
     */
    public function exportExcel()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    /**
     * Generate a PDF of the users.
     */
    public function printPdf()
    {
        $users = User::all();

        if ($users->isEmpty()) {
            return redirect()->back()->with('error', 'No users to export.');
        }

        $pdf = PDF::loadView('users.pdf', compact('users'));
        return $pdf->download('users.pdf');
    }
}
