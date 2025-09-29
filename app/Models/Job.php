<?php
namespace App\Models;


use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model as Models;

class Job extends Models {
    protected $table = 'job_listings';
    protected $fillable = ['title', 'salary'];
}