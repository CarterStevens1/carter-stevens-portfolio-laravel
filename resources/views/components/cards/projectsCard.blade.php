@php
  $technologies = 'Laravel, TailwindCSS, Vue, React, PHP';
@endphp


<a href="#" class="block" aria-label="Projects card">
    <div
        class="group hover:bg-darkPurple-600 rounded-2xl transition-all duration-300 ease-in-out hover:outline hover:outline-white lg:p-5"
    >
    <div class="flex gap-4">
      <div class="w-1/5">
        <img src="{{ asset('images/forth-product-cards.webp') }}" alt="Placeholder image" class="w-full h-full object-contain">
      </div>
      <div class="space-y-6 lg:space-y-4 w-4/5">
          <div class="flex flex-col-reverse justify-between lg:flex-row">
              <h3 class="group-hover:text-violet text-white group-hover:font-bold">Forth Product revamp</h3>
          </div>
          <p class="mt-2 text-sm leading-normal">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus corporis sit sunt? Eveniet quod numquam ea ut dolores, rerum consequuntur!
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
