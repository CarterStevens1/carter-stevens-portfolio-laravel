@props([
    'experiences',
])

<x-layout>
    @foreach ($experiences as $experience)
        <x-cards.experienceCard
            href="/experience/{{ $experience->id }}/edit"
            target="_blank"
            title="{{ $experience->job_title }} - {{ $experience->company }}"
            tenure="{{ $experience->start_date }} - {{ $experience->end_date }}"
            description="{{ $experience->description }}"
            technologies="{{ $experience->skills_used }}"
        />
    @endforeach
</x-layout>
