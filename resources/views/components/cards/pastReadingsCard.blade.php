@props([
    'href',
    'target' => '_self',
    'image',
    'title',
    'description',
    'date',
    'readDate',
])
;

<x-cards.cardWrapper href="{{ $href }}" target="{{ $target }}">
    <div class="flex flex-col gap-6 sm:flex-row">
        <div class="max-w-96 max-sm:order-2 sm:w-2/6">
            <img
                src="{{ asset('images/' . $image) }}"
                alt="Placeholder image"
                class="max-h-[200px] rounded object-contain transition sm:translate-y-1"
            />
        </div>
        <div class="space-y-6 max-sm:order-1 sm:w-4/6 lg:space-y-4">
            <div class="flex flex-col-reverse justify-between lg:flex-row">
                <h3 class="group-hover:text-violet text-white group-hover:font-bold">{{ $title }}</h3>
            </div>
            <p class="mt-2 text-sm leading-normal">
                {{ html_entity_decode($description, ENT_QUOTES, 'UTF-8') }}
            </p>
            <div class="mt-6 flex justify-between gap-4">
                <span>Read on: {{ $readDate }}</span>
                <span>Published on: {{ $date }}</span>
            </div>
        </div>
    </div>
</x-cards.cardWrapper>
