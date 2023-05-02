<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskListController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//kani ang bag-o nga web routes
Route::middleware(['auth'])->group(function () {
    // Add your protected routes here
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
Route::get('/tasks/error', function () {
    return view('tasks.error');
});

    Route::resource('/tasks', TaskController::class);
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);
    Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::post('/tasks/{id}/update', function ($id) {
        $task = Task::find($id);
        $task->finished_at = request('finished') ? now() : null;
        $task->save();
    });

    Route::resource('/tasklists', TaskListController::class);
    Route::post('/tasklists', [TaskListController::class, 'store']);
    Route::delete('/tasklists/{task}', [TaskListController::class, 'destroy']);
    Route::get('/tasklists/{id}/edit', [TaskListController::class, 'edit'])->name('tasklists.edit');
});

// Add your unprotected routes here
Route::get('/', function () {
    return view('welcome');
});
Route::get('/tasks/error', function () {
    return view('tasks.error');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

Route::post('/reset-password', [
    'uses' => 'App\Http\Controllers\Auth\NewPasswordController@store',
    'as' => 'password.update'
]);

Route::post('/logout', function (Request $request) {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/password/reset', [ForgotPasswordController::class, 'index']);

Route::get('/tasklists/{tasklistId}', function ($tasklistId) {
    // ...
})->middleware('auth', 'tasklist.permission');

//julie
Route::middleware(['auth', 'delete'])->group(function () {
    Route::delete('/tasklists/{task}', [TaskListController::class, 'destroy'])->name('setDeletedByAndAt');
});
