@props([
    'experiences',
    'notPersonalProjects',
    'personalProjects',
])
<x-layout>
    <div class="mx-auto max-w-screen-xl lg:flex lg:justify-between lg:gap-6">
        <header class="lg:w-[40%]">
            <x-hero.mainHero
                :experiences="$experiences"
                :notPersonalProjects="$notPersonalProjects"
                :personalProjects="$personalProjects"
            />
        </header>
        <main class="flex flex-col items-center py-12 lg:w-[60%]">
            <x-hero.image />
            <x-global.divider />
            <div>
                <div
                    id="about"
                    class="sticky top-0 z-20 -mx-6 mb-4 w-screen bg-slate-900/75 px-6 py-5 backdrop-blur md:-mx-12 md:px-12 lg:sr-only lg:relative lg:top-auto lg:mx-auto lg:w-full lg:px-0 lg:py-0 lg:opacity-0"
                >
                    <h2 class="text-sm font-bold tracking-widest text-slate-200 uppercase lg:sr-only">About me</h2>
                </div>
                <x-textBlock.text>
                    I am a developer with a passion for creating accessible and unique experiences, that blend
                    thoughtful and innovating designs with robust engineering. My expertise lie in the areas of
                    front-end development, creating experiences that not only look great but are built for perforamnce
                    and accessibility.
                </x-textBlock.text>

                <x-textBlock.text>
                    Currently, I'm a PHP Developer at
                    <x-global.link href="#">Humankind Ventures LTD</x-global.link>
                    , where I manage a house of websites, contributing to the growth of the company by creating and
                    maintaining UI components and design systems. I ensure the platforms meeets web accessibility
                    standars and best practices to make sure each user can easily navigate and interact with the
                    website.
                </x-textBlock.text>
                <x-textBlock.text>
                    I have some experience with backend work and i'm currently learning more about
                    <x-global.link href="#">Laravel</x-global.link>
                    which I am using for this portfolio and have been excited to learn more about it.
                </x-textBlock.text>
                <x-textBlock.text>
                    In my spare time, you can usually find me, reading, Walking the dog, or playing video games.
                </x-textBlock.text>
            </div>
            <x-experience :experiences="$experiences" />
            <x-projects anchorTag="projects" title="Projects" :projects="$personalProjects" />
            <x-projects anchorTag="otherProjects" title="Other Projects" :projects="$notPersonalProjects" />

            {{--
                <x-pastReadings />
            --}}
        </main>
    </div>
</x-layout>
