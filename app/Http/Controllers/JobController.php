<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(3);

        return view('jobs.index', ['jobs' => $jobs]);
    }

    public function showjob(Job $job)
    {
        return view('jobs.show', ['job' => $job]); // verwijst naar resources/views/job.blade.php
    }

    public function addjob(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:100'],
            'salary' => 'required',
        ]);

        $job = Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1,
        ]);

        Mail::to($job->employer->user)->queue(
            new JobPosted($job)
        );

        return redirect('/jobs');
    }

    public function createjob()
    {
        return view('jobs.create');
    }

    public function editjobpage(Job $job)
    {

        return view('jobs.edit', ['job' => $job]);
    }

    public function updatejob(Request $request, Job $job)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:100'],
            'salary' => 'required',
        ]);

        $job->update([
            'title' => $request->input('title'),
            'salary' => $request->input('salary'),
        ]);

        return redirect("/jobs/{$job->id}");
    }

    public function deletejob(Job $job)
    {
        $job->delete();

        return redirect('/jobs');
    }
}