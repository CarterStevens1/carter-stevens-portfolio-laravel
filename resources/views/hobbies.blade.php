@props([
    'experiences' => '',
    'notPersonalProjects' => '',
    'personalProjects' => '',
    'pastReadings' => '',
])

@php
    $movies = config('movies.horror_movies');
@endphp

<x-layout>
    <div class="mx-auto w-full max-w-screen-xl lg:flex lg:justify-between lg:gap-6">
        <header class="lg:w-[40%]">
            <x-hero.mainHero />
        </header>
        <main class="flex flex-col items-center py-12 lg:w-[60%]">
            <x-hobbies.about />
            <x-hobbies.games :games="$games" />
            <x-hobbies.movies :movies="$movies" />
            <x-hobbies.dogPhotos />
        </main>
    </div>
</x-layout>
