<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Models\Job;




Route::get('/', function () {
    return view('home');
});

// Index
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(3);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});
//Create
Route::get('/jobs/create', function (){
    return view('jobs.create');
});
// Show
Route::get('/jobs/{id}', function ($id) {
   $job = Job::find($id);
return view('jobs.show', ['job' => $job]);
});
// Store
Route::post('/jobs', function () {
    request()->validate([
        'Title' => ['required', 'min:3'],
        'Salary' => ['required']
    ]);

    Job::create([
        'title' => request('Title'),
        'salary' => request('Salary'),
        'employer_id' => 1 // For now, assign a static employer ID
    ]);

    return redirect('/jobs');
});
// Edit
Route::get('/jobs/{id}/edit', function ($id) {
   $job = Job::find($id);
    return view('jobs.edit', ['job' => $job]);
});
// Update
Route::patch('/jobs/{id}', function ($id) {
   request()->validate([
        'Title' => ['required', 'min:3'],
        'Salary' => ['required']
    ]);
    $job = Job::findOrFail($id);

    $job->update([
        'title' => request('Title'),
        'salary' => request('Salary')
    ]);
    return redirect('/jobs/' . $job->id);
});
// Destroy
Route::delete('/jobs/{id}', function ($id) {
    $job = Job::findOrFail($id)->delete();
    return redirect('/jobs');
});
// Contact
Route::get('/contact', function () {
    return view('contact');
});