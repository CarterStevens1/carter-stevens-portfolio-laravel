@props([
    'href',
    'target' => '_self',
    'title',
    'tenure',
    'description',
    'technologies' => '',
])

<x-cards.cardWrapper href="{{ $href }}" target="{{ $target }}">
        <div class="space-y-6 lg:space-y-4">
            <div class="flex sm:items-center flex-col-reverse justify-between sm:flex-row">
                <h3 class="group-hover:text-violet text-white group-hover:font-bold">{{ html_entity_decode($title, ENT_QUOTES, 'UTF-8') }}</h3>
                <span class="text-xs max-sm:pb-1">{{ $tenure }}</span>
            </div>
            <p class="mt-2 text-sm leading-normal">
                {{ html_entity_decode($description, ENT_QUOTES, 'UTF-8') }}
            </p>
        </div>
        <ul class="mt-6 flex flex-wrap" aria-label="Technologies used">
            @foreach (explode(',', $technologies) as $technology)
                <li class="mt-2 mr-1.5">
                    <x-global.pill>{{ html_entity_decode($technology, ENT_QUOTES, 'UTF-8') }}</x-pill>
                </li>
            @endforeach
        </ul>
</x-cards.cardWrapper>
