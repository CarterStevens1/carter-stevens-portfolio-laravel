@props([
    'readings',
])

<x-layout>
    <div class="w-full lg:flex lg:flex-col lg:gap-4">
        <x-dashboardNav pageName="View readings" />
        <main class="flex max-w-screen-xl flex-col gap-6 px-4 py-12">
            @foreach ($readings as $reading)
                <x-cards.pastReadingsCard
                    image="{{ $reading->blog_image }}"
                    href="/readings/{{ $reading->id }}/edit"
                    title="{{ $reading->blog_title }}"
                    description="{{ $reading->blog_description }}"
                    date="{{ $reading->blog_date }}"
                    readDate="{{ $reading->read_date }}"
                />
            @endforeach
        </main>
    </div>
</x-layout>
