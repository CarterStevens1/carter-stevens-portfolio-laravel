@props([
    'experiences' => '',
    'notPersonalProjects' => '',
    'personalProjects' => '',
    'pastReadings' => '',
])

<x-layout>
    <div class="mx-auto w-full max-w-screen-xl lg:flex lg:justify-between lg:gap-6">
        <header class="lg:w-[40%]">
            <x-hero.mainHero
                :experiences="$experiences"
                :notPersonalProjects="$notPersonalProjects"
                :personalProjects="$personalProjects"
                :pastReadings="$pastReadings"
            />
        </header>
        <main class="flex flex-col items-center py-12 lg:w-[60%]">g</main>
    </div>
</x-layout>
