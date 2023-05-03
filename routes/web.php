<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskListController;

/**
 * Register web routes for the application.
 *
 * @route /
 * @method GET
 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
 */
Route::get('/', function () {
    return view('welcome');
});

/**
 * Register dashboard routes for authenticated users.
 *
 * @middleware auth:sanctum, config('jetstream.auth_session'), verified
 * @route /dashboard
 * @method GET
 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
 */
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

/**
 * Protected routes that require authentication
 */
Route::middleware(['auth'])->group(function () {
    // Add your protected routes here

    // Dashboard route
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Error route for tasks
    Route::get('/tasks/error', function () {
        return view('tasks.error');
    });

    // Routes for managing tasks
    Route::resource('/tasks', TaskController::class);
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);
    Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::post('/tasks/{id}/update', function ($id) {
        $task = Task::find($id);
        $task->finished_at = request('finished') ? now() : null;
        $task->save();
    });

    // Routes for managing task lists
    Route::resource('/tasklists', TaskListController::class);
    Route::post('/tasklists', [TaskListController::class, 'store']);
    Route::delete('/tasklists/{task}', [TaskListController::class, 'destroy']);
    Route::get('/tasklists/{id}/edit', [TaskListController::class, 'edit'])->name('tasklists.edit');
});

// Add your unprotected routes here
Route::get('/', function () {
    return view('welcome');
});

// Route to handle errors in tasks
Route::get('/tasks/error', function () {
    return view('tasks.error');
});

// Route to show login form
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Route to show welcome page
Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

// Route to handle password reset
Route::post('/reset-password', [
    'uses' => 'App\Http\Controllers\Auth\NewPasswordController@store',
    'as' => 'password.update'
]);

// Route to handle logout
Route::post('/logout', function (Request $request) {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// Route to show password reset form
Route::get('/password/reset', [ForgotPasswordController::class, 'index']);

// Route to handle task list permissions
Route::get('/tasklists/{tasklistId}', function ($tasklistId) {
    // ...
})->middleware('auth', 'tasklist.permission');

// Route to delete task lists with permission check
Route::middleware(['auth', 'delete'])->group(function () {
    Route::delete('/tasklists/{task}', [TaskListController::class, 'destroy'])->name('setDeletedByAndAt');
});