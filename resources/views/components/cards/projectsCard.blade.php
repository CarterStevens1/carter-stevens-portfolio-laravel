@props([
    'href' => '#',
    'image' => '',
    'target' => '_self',
    'title',
    'description',
    'technologies' => '',
])
<a href="{{ $href }}" target="{{ $target }}" class="block" aria-label="Projects card">
    <div
        class="group hover:bg-darkPurple-600 rounded-2xl transition-all duration-300 ease-in-out hover:outline hover:outline-white p-2 sm:p-5 w-full max-w-[800px]"
    >
    <div class="flex sm:flex-row flex-col gap-6">
      <div class="sm:w-2/6 max-w-96 max-sm:order-2">
        <img src="{{ asset('images/' . $image) }}" alt="Placeholder image" class="max-h-[200px] object-contain rounded transition sm:translate-y-1"/>      
      </div>
      <div class="space-y-6 lg:space-y-4 sm:w-4/6 max-sm:order-1">
          <div class="flex flex-col-reverse justify-between lg:flex-row">
              <h3 class="group-hover:text-violet text-white group-hover:font-bold">{{ $title }}</h3>
          </div>
          <p class="mt-2 text-sm leading-normal">
              {{ html_entity_decode($description, ENT_QUOTES, 'UTF-8') }}
          </p>
          <ul class="mt-6 flex flex-wrap" aria-label="Technologies used">
              @foreach (explode(',', $technologies) as $technology)
                  <li class="mt-2 mr-1.5">
                      <x-global.pill>{{ $technology }}</x-pill>
                  </li>
              @endforeach
          </ul>
      </div>
    </div>
    </div>
</a>
