<h2>
    Job Posted Successfully!
</h2>
<p>
    Congrats on posting a new job: {{ $job->title }} with a salary of ${{ $job->salary }}!
</p>
<p>
    <a href="{{ url("/jobs/{$job->id}") }}">View Your Job Listing</a>
</p>