@props([
    'href' => '/',
    'target' => '_self',
    'title',
    'tenure',
    'description',
    'technologies' => '',
])

<a href="{{ $href }}" target="{{ $target }}" class="block" aria-label="Experience card">
    <div
        class="group hover:bg-darkPurple-600 rounded-2xl transition-all duration-300 ease-in-out hover:outline hover:outline-white lg:p-5"
    >
        <div class="space-y-6 lg:space-y-4">
            <div class="flex flex-col-reverse justify-between lg:flex-row">
                <h3 class="group-hover:text-violet text-white group-hover:font-bold">{{ $title }}</h3>
                <span>{{ $tenure }}</span>
            </div>
            <p class="mt-2 text-sm leading-normal">
                {{ html_entity_decode($description, ENT_QUOTES, 'UTF-8') }}
            </p>
        </div>
        <ul class="mt-6 flex flex-wrap" aria-label="Technologies used">
            @foreach (explode(',', $technologies) as $technology)
                <li class="mt-2 mr-1.5">
                    <x-global.pill>{{ $technology }}</x-pill>
                </li>
            @endforeach
        </ul>
    </div>
</a>
