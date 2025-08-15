@props([
    'href' => '',
    'target' => '_self',
])

@if ($href !== '' || $href !== '#')
<a href="{{ $href }}" target="{{ $target }}" class="block" >
@endif
    <div aria-label="Card"
        class="group hover:bg-darkPurple-600 w-full max-w-[800px] rounded-2xl p-2 transition-all duration-300 ease-in-out hover:outline hover:outline-white sm:p-5"
    >
        {{ $slot }}
    </div>
@if ($href !== '' || $href !== '#')
</a>    
@endif
