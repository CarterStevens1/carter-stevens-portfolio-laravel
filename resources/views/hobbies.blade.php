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
            <section>
                <div class="mb-16 scroll-mt-16 space-y-8 md:mb-24">
                    <div
                        id="about"
                        class="sticky top-0 z-20 -mx-6 mb-4 w-screen bg-slate-900/75 px-6 py-5 backdrop-blur md:-mx-12 md:px-12 lg:sr-only lg:relative lg:top-auto lg:mx-auto lg:w-full lg:px-0 lg:py-0 lg:opacity-0"
                    >
                        <h2 class="text-sm font-bold tracking-widest text-slate-200 uppercase lg:sr-only">About me</h2>
                    </div>
                    <x-textBlock.text>
                        Here you can find a bit more about me as a person, my interests and what I do in my spare time.
                        I grew up loving video games and this has stuck with me ever since. My range of games is not
                        really limited and I generally play whatever looks good, ranging from cosy simulators to full
                        blown action adventure games.
                    </x-textBlock.text>
                    <x-textBlock.text>
                        Below you can find some of my favourite games with a link to my Backloggd page containing all
                        the games I have
                        <strong class="italic underline">EVER</strong>
                        played.
                        <small class="block">(minus the ones I can't remember)</small>
                    </x-textBlock.text>

                    <x-textBlock.text>
                        If I am not gaming you can usually find me, watching youtube, reading, or probably watching
                        horror movies with my partner.
                        <small class="block">
                            (I never used to like horror movies until I had to endure them everyday but now I love them)
                        </small>
                    </x-textBlock.text>

                    <x-textBlock.text>
                        Further down you can find some of the recent horror movies I have watched.
                    </x-textBlock.text>

                    <x-textBlock.text>
                        Other than that, I am just a normal guy who likes a good cider on the weekend and relaxing.
                        <small class="block">(Bonus: Some photos of my dog at the bottom of the page)</small>
                    </x-textBlock.text>
                </div>
            </section>
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
            <section id="horrorMovies" class="relative w-full pt-6">
                <div
                    id="horror-movies"
                    class="sticky top-0 z-20 -mx-6 mb-4 w-screen bg-slate-900/75 px-6 py-5 backdrop-blur md:-mx-12 md:px-12 lg:sr-only lg:relative lg:top-auto lg:mx-auto lg:w-full lg:px-0 lg:py-0 lg:opacity-0"
                >
                    <h2 class="text-sm font-bold tracking-widest text-slate-200 uppercase lg:sr-only">Horror Movies</h2>
                </div>
                @if (count($movies) > 0)
                    <div class="mt-8 grid grid-cols-2 gap-6 md:grid-cols-2 lg:grid-cols-4 lg:gap-12">
                        @foreach ($movies as $movie)
                            <x-cards.movieCard :image="$movie['image']" :title="$movie['title']" />
                        @endforeach
                    </div>
                @else
                    <div class="py-12 text-center">
                        <p class="text-lg text-gray-600">No Movies found.</p>
                    </div>
                @endif
            </section>
        </main>
    </div>
</x-layout>
