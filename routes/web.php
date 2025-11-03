<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Models\Job;




Route::get('/', function () {
    return view('home');
});


Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(3);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/create', function (){
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id) {
   $job = Job::find($id);
return view('jobs.show', ['job' => $job]);
});

Route::post('/jobs', function () {
    // Validate the incoming request data

    Job::create([
        'title' => request('Title'),
        'salary' => request('Salary'),
        'employer_id' => 1 // For now, assign a static employer ID
    ]);

    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});