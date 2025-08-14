@props([
    'experiences',
])
@if ($experiences->isNotEmpty())
    <section id="experience" class="my-16 space-y-8 md:mb-24 lg:my-26" aria-label="Work experience">
        <div
            class="sticky top-0 z-20 -mx-6 mb-4 w-screen bg-slate-900/75 px-6 py-5 backdrop-blur md:-mx-12 md:px-12 lg:sr-only lg:relative lg:top-auto lg:mx-auto lg:w-full lg:px-0 lg:py-0 lg:opacity-0"
        >
            <h2 class="text-sm font-bold tracking-widest text-slate-200 uppercase lg:sr-only">Experience</h2>
        </div>
        @foreach ($experiences as $experience)
            <x-cards.experienceCard
                href="{{ $experience->website_url }}"
                target="_blank"
                title="{{ $experience->job_title }} - {{ $experience->company }}"
                tenure="{{ $experience->start_date }} - {{ $experience->end_date }}"
                description="{{ $experience->description }}"
                technologies="{{ $experience->skills_used }}"
            />
        @endforeach
    </section>
@endif
