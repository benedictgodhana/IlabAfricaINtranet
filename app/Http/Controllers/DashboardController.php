<?php

namespace App\Http\Controllers;

use App\Models\User;        // Import the User model
use App\Models\Notice;     // Import the Notice model
use App\Models\Birthday;    // Import the Birthday model
use App\Models\Event;       // Import the Event model
use Illuminate\Http\Request;
use Carbon\Carbon;          // Import Carbon for date handling

class DashboardController extends Controller
{
    public function index()
    {
        // Count the total number of notices, birthdays, users, and events
        $noticesCount = Notice::count(); // Count of notices
        $birthdaysCount = Birthday::count(); // Count of birthdays
        $usersCount = User::count(); // Count of users
        $eventsCount = Event::count(); // Count of events

        // Get today's date
        $today = Carbon::today(); // Get today's date

        // Fetch today's birthdays
        $birthdaysToday = Birthday::whereDate('birth_date', $today)->get(); // Get birthdays for today

        // Fetch today's events (assuming you have a 'date' field)
        $eventsToday = Event::whereDate('date', $today)->get(); // Adjust 'date' as necessary

        // Fetch all events
        $events = Event::all(['id', 'title', 'start_time', 'end_time', 'organizers', 'venue']);

        return view('dashboard', compact(
            'noticesCount',
            'birthdaysCount',
            'usersCount', // Pass the user count to the view
            'birthdaysToday', // Pass today's birthdays to the view
            'eventsCount', // Pass the count of events to the view
            'eventsToday', // Pass today's events to the view
            'events' // Pass all events to the view
        ));
    }
}
