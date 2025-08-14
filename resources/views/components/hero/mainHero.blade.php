@props([
    'experiences',
    'notPersonalProjects',
    'personalProjects',
])

<section class="flex h-full flex-col py-12 transition duration-300 lg:sticky lg:top-0 lg:h-screen lg:justify-between">
    <div>
        <h1
            class="font-['Gloria_Hallelujah'] text-4xl leading-normal font-bold tracking-tight text-slate-200 sm:text-5xl"
        >
            <a href="/" class="hover:text-white">Carter Stevens</a>
        </h1>
        <span class="mt-4 text-lg text-slate-200">Front End Developer / PHP Developer</span>
        <p class="mt-4 max-w-xs">I build accessible and unique experiences, making the web a little better everyday!</p>

        <nav class="nav hidden lg:block" aria-label="In-page jump links">
            <ul class="mt-16 w-max">
                <x-hero.navItem href="#about">About</x-hero.navItem>
                @if ($experiences->isNotEmpty())
                    <x-hero.navItem href="#experience">Experience</x-hero.navItem>
                @endif

                @if ($personalProjects->isNotEmpty())
                    <x-hero.navItem href="#projects">Projects</x-hero.navItem>
                @endif

                @if ($notPersonalProjects->isNotEmpty())
                    <x-hero.navItem href="#otherProjects">Other Projects</x-hero.navItem>
                @endif
            </ul>
        </nav>
    </div>

    <div class="py-4">
        <x-socialLinks />
    </div>
</section>
