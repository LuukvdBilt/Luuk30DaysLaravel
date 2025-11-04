<x-layout>
    <x-slot:heading>
        Jobs Listings
    </x-slot:heading>
    <h2>{{ $job->title }}</h2>
    <p>Salary: ${{ $job->salary }}</p>


    <p class="mt-6">
      <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
    </p>

</x-layout>