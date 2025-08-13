<x-layout>
    <div class="w-full lg:flex lg:flex-col lg:gap-4">
        <nav class="flex gap-x-4">
            <x-link href="/" class="text-slate-200 hover:text-white">Home</x-link>
            <x-link href="/dashboard" class="text-slate-200 hover:text-white">Dashboard</x-link>
            <x-link href="{{ url('/edit') }}" class="text-slate-200 hover:text-white">Edit Profile</x-link>
            <form method="POST" action="/logout">
                @csrf
                @method('POST')
                <button id="logOut" variant="peach" href="{{ Route('logout') }}">Log Out</button>
            </form>
        </nav>
        <header class="lg:w-[48%]">
            <div class="flex flex-col py-12 transition duration-300 lg:sticky lg:top-0 lg:justify-between">
                <div>
                    <h1 class="text-4xl font-bold tracking-tight text-slate-200 sm:text-5xl">
                        <span class="block text-slate-200">Welcome</span>
                        <span class="block text-teal-300">{{ Auth::user()->name }}</span>
                    </h1>
                    <h2 class="mt-3 text-lg font-medium tracking-tight text-slate-400 sm:text-xl">Dashboard</h2>
                    <p class="mt-6 text-base leading-7 text-slate-400">
                        Manage your portfolio and view your current experience details.
                    </p>
                </div>
            </div>
        </header>

        <main class="flex flex-col items-center py-12 lg:w-[52%]">
            <!-- Dashboard Actions Card -->
            <div class="mb-8 w-full max-w-md">
                <div class="rounded-lg bg-slate-800/50 p-6 ring-1 ring-slate-700/50">
                    <h3 class="mb-4 text-lg font-semibold text-slate-200">Quick Actions</h3>
                    <div class="space-y-3">
                        <a
                            {{-- href="{{ route('experience.index') }}" --}}
                            class="block w-full rounded-md bg-teal-600 px-4 py-2 text-center text-sm font-medium text-white transition-colors hover:bg-teal-500"
                        >
                            View Current Experience
                        </a>
                        <a
                            href="{{ route('experience.create') }}"
                            class="block w-full rounded-md border border-slate-600 px-4 py-2 text-center text-sm font-medium text-slate-200 transition-colors hover:bg-slate-700"
                        >
                            Add New Experience
                        </a>
                        <a
                            {{-- href="{{ route('profile.edit') }}" --}}
                            class="block w-full rounded-md border border-slate-600 px-4 py-2 text-center text-sm font-medium text-slate-200 transition-colors hover:bg-slate-700"
                        >
                            Edit Profile
                        </a>
                    </div>
                </div>
            </div>

            <x-divider />

            <!-- Current Stats Section -->
            <div class="w-full max-w-2xl">
                <div
                    class="sticky top-0 z-20 -mx-6 mb-4 w-screen bg-slate-900/75 px-6 py-5 backdrop-blur md:-mx-12 md:px-12 lg:sr-only lg:relative lg:top-auto lg:mx-auto lg:w-full lg:px-0 lg:py-0 lg:opacity-0"
                >
                    <h2 class="text-sm font-bold tracking-widest text-slate-200 uppercase lg:sr-only">
                        Dashboard Overview
                    </h2>
                </div>
            </div>
        </main>
    </div>
</x-layout>
