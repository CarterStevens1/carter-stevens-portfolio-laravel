<nav class="nav hidden lg:block" aria-label="In-page jump links">
    <ul class="mt-16 w-max">
        <x-hero.navItem href="#about">About</x-hero.navItem>

        @isset($experiences)
            <x-hero.navItem href="#experience">Experience</x-hero.navItem>
        @endisset

        @isset($personalProjects)
            <x-hero.navItem href="#projects">Projects</x-hero.navItem>
        @endisset

        @isset($notPersonalProjects)
            <x-hero.navItem href="#otherProjects">Other Projects</x-hero.navItem>
        @endisset

        @isset($pastReadings)
            <x-hero.navItem href="#pastReadings">Articles I've Read</x-hero.navItem>
        @endisset

        @if (Route::currentRouteName() === 'hobbies')
            <x-hero.navItem href="#topGames">Games</x-hero.navItem>
            <x-hero.navItem href="#horrorMovies">Horror Movies</x-hero.navItem>
            <x-hero.navItem href="#dogPhotos">Dog Photos</x-hero.navItem>
        @endif
    </ul>
</nav>
