@props([
    'experiences' => '',
    'notPersonalProjects' => '',
    'personalProjects' => '',
    'pastReadings' => '',
])

<x-layout>
    <div class="mx-auto w-full max-w-screen-xl lg:flex lg:justify-between lg:gap-6">
        <header class="lg:w-[40%]">
            <x-hero.mainHero />
        </header>
        <main class="flex flex-col items-center py-12 lg:w-[60%]">
            <section id="played-games relative w-full">
                <h2>Played Games</h2>

                @if (count($games) > 0)
                    <div class="mt-8 grid grid-cols-2 gap-6 md:grid-cols-2 lg:grid-cols-4 lg:gap-12">
                        @foreach ($games as $game)
                            <x-cards.gameCard
                                image="https:{{ str_replace('t_thumb', 't_cover_big', $game['cover']['url']) }}"
                                :title="$game['name']"
                            />
                        @endforeach
                    </div>
                @else
                    <div class="py-12 text-center">
                        <div class="mb-4 text-6xl text-gray-400">🎮</div>
                        <p class="text-lg text-gray-600">No games found.</p>
                        <p class="mt-2 text-sm text-gray-500">Check your configuration or try refreshing the cache.</p>
                    </div>
                @endif
            </section>
        </main>
    </div>
</x-layout>
