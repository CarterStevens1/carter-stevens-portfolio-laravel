@props([
    'readings',
    'title',
    'anchorTag',
])
@if ($readings->isNotEmpty())
    <section id="{{ $anchorTag }}" class="mb-16 w-full scroll-mt-16 space-y-8 md:mb-24" aria-label="Past Readings">
        <div
            class="sticky top-0 z-20 -mx-6 mb-4 w-screen bg-slate-900/75 px-6 py-5 backdrop-blur md:-mx-12 md:px-12 lg:sr-only lg:relative lg:top-auto lg:mx-auto lg:w-full lg:px-0 lg:py-0 lg:opacity-0"
        >
            <h2 class="text-sm font-bold tracking-widest text-slate-200 uppercase lg:sr-only">{{ $title }}</h2>
        </div>
        @foreach ($readings as $reading)
            <x-cards.pastReadingsCard
                image="{{ $reading->blog_image }}"
                href="{{ $reading->blog_url }}"
                title="{{ $reading->blog_title }}"
                description="{{ $reading->blog_description }}"
                date="{{ $reading->blog_date }}"
                readDate="{{ $reading->read_date }}"
            />
        @endforeach
    </section>
@endif
