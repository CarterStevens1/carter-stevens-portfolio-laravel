@props([
    'movies' => '',
])

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
