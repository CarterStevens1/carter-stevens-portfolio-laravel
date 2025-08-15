@props([
    'experiences',
])

<x-layout>
    <div class="w-full lg:flex lg:flex-col lg:gap-4">
        <x-dashboardNav pageName="View experiences" />
        <main class="flex max-w-screen-xl flex-col gap-6 px-4 py-12">
            @foreach ($experiences as $experience)
                <x-cards.experienceCard
                    href="/experience/{{ $experience->id }}/edit"
                    title="{{ $experience->job_title }}{{$experience->company ? ' - ' . $experience->company : '' }}"
                    tenure="{{ $experience->start_date }} - {{ $experience->end_date }}"
                    description="{{ $experience->description }}"
                    technologies="{{ $experience->skills_used }}"
                />
            @endforeach
        </main>
    </div>
</x-layout>
