@props([
    'projects',
])

<x-layout>
    <div class="w-full lg:flex lg:flex-col lg:gap-4">
        <x-dashboardNav pageName="View projects" />
        <main class="flex items-center py-12">
            @foreach ($projects as $project)
                <x-cards.projectsCard
                    image="{{ $project->image }}"
                    href="/project/{{ $project->id }}/edit"
                    title="{{ $project->title }} - {{ $project->company }}"
                    description="{{ $project->description }}"
                    technologies="{{ $project->skills_used }}"
                />
            @endforeach
        </main>
    </div>
</x-layout>
