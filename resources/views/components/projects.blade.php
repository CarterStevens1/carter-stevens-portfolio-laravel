@props([
    'projects',
])

<section id="projects" class="my-16 space-y-8 md:mb-24 lg:my-26" aria-label="Projects">
    <div
        class="sticky top-0 z-20 -mx-6 mb-4 w-screen bg-slate-900/75 px-6 py-5 backdrop-blur md:-mx-12 md:px-12 lg:sr-only lg:relative lg:top-auto lg:mx-auto lg:w-full lg:px-0 lg:py-0 lg:opacity-0"
    >
        <h2 class="text-sm font-bold tracking-widest text-slate-200 uppercase lg:sr-only">Projects</h2>
    </div>
    @foreach ($projects as $project)
        <x-cards.projectsCard
            image="{{ $project->image }}"
            href="/project/{{ $project->id }}/edit"
            title="{{ $project->title }} - {{ $project->company }}"
            description="{{ $project->description }}"
            technologies="{{ $project->skills_used }}"
        />
    @endforeach
</section>
