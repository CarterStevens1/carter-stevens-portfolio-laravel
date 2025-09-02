<nav class="nav hidden lg:block" aria-label="In-page jump links">
    <ul class="mt-16 w-max">
        <x-hero.navItem href="#about">About</x-hero.navItem>

        @if ($experiences)
            <x-hero.navItem href="#experience">Experience</x-hero.navItem>
        @endif

        @if ($personalProjects)
            <x-hero.navItem href="#projects">Projects</x-hero.navItem>
        @endif

        @if ($notPersonalProjects)
            <x-hero.navItem href="#otherProjects">Other Projects</x-hero.navItem>
        @endif

        @if ($pastReadings)
            <x-hero.navItem href="#pastReadings">Articles I've Read</x-hero.navItem>
        @endif
    </ul>
</nav>
