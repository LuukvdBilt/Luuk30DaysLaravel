<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;

Route::get('/', function () {
    return view('home');
});


Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => [
            [
                'id' => 1,
                'title' => 'Software Engineer',
                'salary' => '120000',
            ]
            ,
            [
                'id' => 2,
                'title' => 'Data Scientist',
                'salary' => '130000',
            ],
            [
                'id' => 3,
                'title' => 'Product Manager',
                'salary' => '110000',
            ]
        ]
    ]);
});

Route::get('/jobs/{id}', function ($id){
    $jobs = [
            [
                'id' => 1,
                'title' => 'Software Engineer',
                'salary' => '120000',
            ]
            ,
            [
                'id' => 2,
                'title' => 'Data Scientist',
                'salary' => '130000',
            ],
            [
                'id' => 3,
                'title' => 'Product Manager',
                'salary' => '110000',
            ]
            ];
$job = Arr::first($jobs, fn($job) => $job['id'] == $id);
dd($job);


return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});