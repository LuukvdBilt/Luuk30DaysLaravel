<?php

use App\Http\Controllers\contactController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Jobs\TranslateJob;
use App\Models\Job;


Route::get('test', function() {
    $job = Job::first();

    TranslateJob::dispatch($job);

    return 'done';
});

Route::controller(JobController::class)->group(function () {
    // shows all jobs
    Route::get('/jobs', 'index');
    // shows create job form
    Route::get('/jobs/create', 'createjob');
    // saves new job to database
    Route::post('/jobs', 'addjob')->middleware('auth');
    // shows single job
    Route::get('/jobs/{job}', 'showjob');
    // edit single job
    Route::get('/jobs/{job}/edit', 'editjobpage')->middleware('auth')->can('edit', 'job');
    // updates job in database
    Route::patch('/jobs/{job}/', 'updatejob');
    // destroy job in database
    Route::delete('/jobs/{job}/', 'deletejob');
});

// shows homepage
Route::get('/', [homeController::class, 'index']);

// contact page
Route::get('/contact', [contactController::class, 'index']);

Route::controller(RegisterUserController::class)->group(function () {
    Route::get('/register', 'create');
    Route::post('/register', 'store');
});

// login
Route::controller(SessionController::class)->group(function () {
    Route::get('/login', 'create');
    Route::post('/login', 'store');
});

// logout route
Route::post('/logout', [SessionController::class, 'destroy']);