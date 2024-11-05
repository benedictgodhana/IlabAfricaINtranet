<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Models\Blog;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BirthdayController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NoticeController;
use App\Models\Destination;
use App\Models\Package;
use App\Models\Tour;
use Carbon\Carbon;
use App\Models\Notice;
use App\Models\Birthday; // Make sure to import the User model
use App\Http\Controllers\EventController;
use App\Models\Event;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/





Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


Route::resource('users', UserController::class)->middleware(['auth', 'verified']);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');



Route::get('/', function () {
    // Fetch all notices from the database
    $notices = Notice::all()->map(function ($notice) {
        return [
            'id' => $notice->id,
            'content' => $notice->content,
            'details_link' => route('notice.show', $notice->id) // Generate details link
        ];
    });

    // Get today's date
    $today = Carbon::today()->format('m-d');

    // Fetch users whose birthday is today
    $birthdaysToday = Birthday::whereMonth('birth_date', now()->month)
        ->whereDay('birth_date', now()->day)
        ->get();

    // Fetch all events from the database
    $events = Event::all(['id', 'title', 'start_time', 'end_time', 'organizers', 'venue']);

    // Pass the notices, birthdays, and events to the 'welcome' view
    return view('welcome', compact('notices', 'birthdaysToday', 'events'));
});






Route::get('/about', function () {
    return view('About');
});



Route::get('/reports', function () {
    return view('Reports');
});



Route::get('/policies', function () {
    return view('Policies');
});


Route::get('/templates', function () {
    return view('Templates');
});



Route::get('/forms', function () {
    return view('Forms');
});




Route::get('/departments', function () {
    return view('Departments');
});



Route::get('/department', function () {
    return view('Departments');
});

Route::middleware(['auth'])->group(function () {
    // Resource routes for Notices and Birthdays
    Route::resource('notices', NoticeController::class);
    Route::resource('birthdays', BirthdayController::class);

    Route::resource('events', EventController::class);
});


Route::get('/users/export-excel', [UserController::class, 'exportExcel'])->name('users.export');
Route::get('/users/print-pdf', [UserController::class, 'printPdf'])->name('users.print.pdf');
Route::post('/notices/{notice}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/notice/{id}', [NoticeController::class, 'showNotice'])->name('notice.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';