@props([
    'games' => '',
])

<section id="topGames" class="relative w-full">
    <div
        id="top-games"
        class="sticky top-0 z-20 -mx-6 mb-4 w-screen bg-slate-900/75 px-6 py-5 backdrop-blur md:-mx-12 md:px-12 lg:sr-only lg:relative lg:top-auto lg:mx-auto lg:w-full lg:px-0 lg:py-0 lg:opacity-0"
    >
        <h2 class="text-sm font-bold tracking-widest text-slate-200 uppercase lg:sr-only">Top Games</h2>
    </div>
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

    <x-global.link href="https://bckl.gg/ogWO" class="mt-8 inline-flex gap-4">
        View all games on backloggd
        <x-svgs.arrowRight />
    </x-global.link>
</section>
