@props([
    'href' => '#',
    'target' => '_self',
])

<a href="{{ $href }}" target="{{ $target }}" class="block" aria-label="Experience card">
    <div
        class="group hover:bg-darkPurple-600 w-full max-w-[800px] rounded-2xl p-2 transition-all duration-300 ease-in-out hover:outline hover:outline-white sm:p-5"
    >
        {{ $slot }}
    </div>
</a>
