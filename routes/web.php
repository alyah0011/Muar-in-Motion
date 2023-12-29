<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\AttractionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AccomodationController;
use App\Http\Controllers\AccoReviewController;
use App\Http\Controllers\TransportationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoListController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\SearchController;

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminHomepageController;
use App\Http\Controllers\AdminAttractionController;
use App\Http\Controllers\AdminAccommodationController;
use App\Http\Controllers\AdminTransportationController;
use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\AdminForumController;

use App\Models\Accomodation; 
use App\Models\Transportation; 

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

Route::get('/', [HomeController::class, 'notLoggedInUser'])->name('homepage');

Route::get('/dashboard', [HomeController::class, 'loggedInUser'])->name('dashboard');

Route::get('/attraction', function () {
    return view('attraction.main');
})->name('attraction');

Route::get('/attraction', [AttractionController::class, 'index'])->name('attraction');

Route::get('/attraction/category', function () {
        return view('attraction.category');
})->name('category');
Route::get('/attractions/{att_id}', [AttractionController::class, 'show'])->name('attraction.detail');

Route::get('/events', function () {
        return view('event.main');
})->name('events');
Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/events/filter', [EventController::class, 'filterEvents'])->name('events.filter');
Route::get('/events/{eve_id}', [EventController::class, 'show'])->name('event.child');

Route::get('/category/{category}', [AttractionController::class, 'attractionsByCategory'])->name('attractions.by.category');

Route::get('/forum', function () {
        return view('forum');
})->name('forum');





Route::get('/attractions&transportation', function () {
    $topAccommodations = Accomodation::orderByDesc('acco_average_rating')->take(6)->get();
    $topTransportations = Transportation::take(6)->get();
    
    return view('ant.main', compact('topAccommodations', 'topTransportations'));
})->name('ant.main');

Route::get('/accommodation', [AccomodationController::class, 'index'])->name('accommodation.index');

    // Route to show details of a specific accommodation
Route::get('/accommodation/{acco_id}', [AccomodationController::class, 'show'])->name('accommodation.show');

Route::get('/transportation', [TransportationController::class, 'index'])->name('transportation.index');

Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');

Route::get('/search', [SearchController::class, 'search'])->name('search');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/userprofile', function () {
        return view('userprofile');
    })->name('userprofile');

    Route::get('/tdl', [TodoListController::class, 'showAllLists'])->name('todo.showAllLists');
    Route::post('/create-list', [TodoListController::class, 'createList'])->name('todo.createList');
    Route::post('/add-task/{tdl_id}', [TodoListController::class, 'addTask'])->name('todo.addTask');
    Route::post('/update-task-status/{taskId}', [TodoListController::class, 'updateTaskStatus']);
    Route::delete('/delete-list/{tdl_id}', [TodoListController::class, 'destroy'])->name('tdl.destroy');

    Route::get('/bookmark', [BookmarkController::class, 'index'])->name('bookmarks');
    Route::post('/bookmarks/bookmark', [BookmarkController::class, 'bookmark'])
    ->middleware('auth') // Add this line to apply the auth middleware
    ->name('bookmarks.bookmark');
    Route::post('/bookmarks/unbookmark', [BookmarkController::class, 'unbookmark'])->name('bookmarks.unbookmark');


    Route::post('/user/update-travel-preferences',  [UserController::class, 'update'])->name('user.updateTravelPreferences');
    
    Route::post('/forum', [ForumController::class, 'store'])->name('forum.store');
    Route::post('/forums/like/{id}', [ForumController::class, 'like'])->name('forums.like');
    Route::post('/forums/comment/{forum}', [ForumController::class, 'comment'])->name('forum.comment');
        
    Route::post('/attractions/{attraction}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

    Route::post('/accommodation/{accommodation}/reviews', [AccoReviewController::class, 'store'])->name('accoreviews.store');

    Route::prefix('admin')->group(function () {

        Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('homepage', [AdminHomepageController::class, 'index'])->name('admin.homepage.index');
        Route::put('/admin/homepage/{id}/{subdirectory}', [AdminHomepageController::class, 'update'])->name('admin.homepage.update');

        Route::get('/attraction', [AdminAttractionController::class, 'index'])->name('admin.attraction.index');
        Route::get('/attraction/create', [AdminAttractionController::class, 'create'])->name('admin.attraction.create');
        Route::post('/attraction/store', [AdminAttractionController::class, 'store'])->name('admin.attraction.store');
        Route::get('/attraction/{id}/edit', [AdminAttractionController::class, 'edit'])->name('admin.attraction.edit');
        Route::put('/attraction/{id}/update', [AdminAttractionController::class, 'update'])->name('admin.attraction.update');
        Route::delete('/attraction/{id}/destroy', [AdminAttractionController::class, 'destroy'])->name('admin.attraction.destroy');

        Route::get('/accommodation', [AdminAccommodationController::class, 'index'])->name('admin.accommodation.index');
        Route::get('/accommodation/create', [AdminAccommodationController::class, 'create'])->name('admin.accommodation.create');
        Route::post('/accommodation/store', [AdminAccommodationController::class, 'store'])->name('admin.accommodation.store');
        Route::get('/accommodation/{id}/edit', [AdminAccommodationController::class, 'edit'])->name('admin.accommodation.edit');
        Route::put('/accommodation/{id}/update', [AdminAccommodationController::class, 'update'])->name('admin.accommodation.update');
        Route::delete('/accommodation/{id}/destroy', [AdminAccommodationController::class, 'destroy'])->name('admin.accommodation.destroy');

        Route::get('/transportation', [AdminTransportationController::class, 'index'])->name('admin.transportation.index');
        Route::get('/transportation/create', [AdminTransportationController::class, 'create'])->name('admin.transportation.create');
        Route::post('/transportation/store', [AdminTransportationController::class, 'store'])->name('admin.transportation.store');
        Route::get('/transportation/{id}/edit', [AdminTransportationController::class, 'edit'])->name('admin.transportation.edit');
        Route::put('/transportation/{id}/update', [AdminTransportationController::class, 'update'])->name('admin.transportation.update');
        Route::delete('/transportation/{id}/destroy', [AdminTransportationController::class, 'destroy'])->name('admin.transportation.destroy');

        Route::get('/event', [AdminEventController::class, 'index'])->name('admin.event.index');
        Route::get('/event/create', [AdminEventController::class, 'create'])->name('admin.event.create');
        Route::post('/event/store', [AdminEventController::class, 'store'])->name('admin.event.store');
        Route::get('/event/{id}/edit', [AdminEventController::class, 'edit'])->name('admin.event.edit');
        Route::put('/event/{id}/update', [AdminEventController::class, 'update'])->name('admin.event.update');
        Route::delete('/event/{id}/destroy', [AdminEventController::class, 'destroy'])->name('admin.event.destroy');

        Route::get('/forum', [AdminForumController::class, 'index'])->name('admin.forum.index');
        Route::put('/admin/forum/{id}/update-status', [AdminForumController::class, 'updateStatus'])->name('admin.forum.update-status');
        Route::delete('/forum/{id}/destroy', [AdminForumController::class, 'destroy'])->name('admin.forum.destroy');
    });
    
});
