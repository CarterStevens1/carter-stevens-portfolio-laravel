@props([
    'experiences' => '',
    'notPersonalProjects' => '',
    'personalProjects' => '',
    'pastReadings' => '',
])

<x-layout>
    <div class="mx-auto w-full max-w-screen-xl lg:flex lg:justify-between lg:gap-6">
        <header class="lg:w-[40%]">
            <x-hero.mainHero
                :experiences="$experiences"
                :notPersonalProjects="$notPersonalProjects"
                :personalProjects="$personalProjects"
                :pastReadings="$pastReadings"
            />
        </header>
        <main class="flex flex-col items-center py-12 lg:w-[60%]">
            <section id="played-games relative w-full">
                <h2>Played Games</h2>
                <div class="mt-8 grid grid-cols-2 gap-6 md:grid-cols-2 lg:grid-cols-4 lg:gap-12">
                    <div
                        class="group relative max-w-fit rounded-lg transition-all duration-200 ease-in-out before:transition-all before:duration-200 before:ease-in-out hover:scale-105 hover:outline hover:outline-white hover:before:absolute hover:before:h-full hover:before:w-full hover:before:rounded-lg hover:before:bg-black/50 hover:before:content-['']"
                    >
                        <img
                            class="max-h-50 max-w-40 rounded-lg object-contain"
                            src="https://images.igdb.com/igdb/image/upload/t_cover_big/coa1i1.jpg"
                            alt="Games"
                        />
                        <span
                            class="absolute top-1/2 left-1/2 w-4/5 -translate-1/2 text-center text-sm text-white opacity-0 transition-all duration-200 ease-in-out group-hover:opacity-100"
                        >
                            Peak
                        </span>
                    </div>
                </div>
            </section>
        </main>
    </div>
</x-layout>
