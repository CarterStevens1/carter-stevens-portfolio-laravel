@props([
    'image' => '',
    'title' => '',
])
<div
    class="group relative max-w-fit rounded-lg transition-all duration-200 ease-in-out before:transition-all before:duration-200 before:ease-in-out hover:scale-105 hover:outline hover:outline-white hover:before:absolute hover:before:h-full hover:before:w-full hover:before:rounded-lg hover:before:bg-black/50 hover:before:content-['']"
>
    <img class="max-h-50 max-w-40 rounded-lg object-contain" src="{{ asset($image) }}" alt="{{ $title }}" />
    <span
        class="absolute top-1/2 left-1/2 w-4/5 -translate-1/2 text-center text-sm text-white opacity-0 transition-all duration-200 ease-in-out group-hover:opacity-100"
    >
        {{ $title }}
    </span>
</div>
