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

    <dialog
        class="inset-1/2 -translate-x-1/2 -translate-y-1/2 scale-0 bg-transparent opacity-0 transition-all duration-300 ease-linear open:block open:scale-100 open:opacity-100 starting:open:scale-0 starting:open:opacity-0"
    >
        <img class="max-h-100 max-w-80 rounded-lg object-contain" src="" alt="" />
    </dialog>
</x-layout>
