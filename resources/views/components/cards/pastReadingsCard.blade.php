@props([
    'href',
    'target' => '_self',
    'image',
    'title',
    'description',
    'date',
    'readDate',
])

<x-cards.cardWrapper href="{{ $href }}" target="{{ $target }}">
    <div class="flex flex-col gap-6 sm:flex-row">
        <div class="max-w-96 max-sm:order-2 sm:w-2/6">
            <img
                src="{{ asset('images/' . $image) }}"
                alt="Placeholder image"
                class="max-h-[150px] w-full rounded object-contain transition sm:translate-y-1"
            />
        </div>
        <div class="flex flex-col space-y-6 max-sm:order-1 sm:w-4/6 lg:space-y-4">
            <div class="flex flex-col">
                <h3 class="group-hover:text-violet text-white group-hover:font-bold">{{ $title }}</h3>
                <p class="mt-2 text-sm leading-normal">
                    {{ html_entity_decode($description, ENT_QUOTES, 'UTF-8') }}
                </p>
            </div>
            <div class="mt-auto flex justify-between gap-4">
                <span>Read on: {{ date('d M Y', strtotime($readDate)) }}</span>
                @if ($href)
                    <x-svgs.external />
                @endif
            </div>
        </div>
    </div>
</x-cards.cardWrapper>
