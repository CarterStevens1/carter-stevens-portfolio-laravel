@props([
    'experiences' => '',
    'notPersonalProjects' => '',
    'personalProjects' => '',
    'pastReadings' => '',
])

<x-layout>
    <div class="mx-auto w-full max-w-screen-xl lg:flex lg:justify-between lg:gap-6">
        <header class="lg:w-[40%]">
            <x-hero.mainHero />
        </header>
        <main class="flex flex-col items-center py-12 lg:w-[60%]">
            <section id="played-games relative w-full">
                <h2>Played Games</h2>
                <div class="mt-8 grid grid-cols-2 gap-6 md:grid-cols-2 lg:grid-cols-4 lg:gap-12">
                    <x-cards.gameCard
                        image="https://images.igdb.com/igdb/image/upload/t_cover_big/coa1i1.jpg"
                        title="peak"
                    />
                </div>
            </section>
        </main>
    </div>
</x-layout>
