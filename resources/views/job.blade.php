<x-layout>
    <x-slot:heading>
        Jobs Listings
    </x-slot:heading>
    <h2>{{ $job['title'] }}</h2>
    <p>Salary: ${{ $job['salary'] }}</p>
</x-layout>