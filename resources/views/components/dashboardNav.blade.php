<nav class="flex justify-end gap-x-6 py-5">
    <x-global.link href="/" class="text-slate-200 hover:text-white">Home</x-global.link>
    <x-global.link href="/dashboard" class="text-slate-200 hover:text-white">Dashboard</x-global.link>
    <x-global.link href="{{ url('/edit') }}" class="text-slate-200 hover:text-white">Edit Profile</x-global.link>
    <form method="POST" action="/logout">
        @csrf
        @method('POST')
        <button class="cursor-pointer" id="logOut" href="{{ Route('logout') }}">Log Out</button>
    </form>
</nav>
<header class="lg:w-[48%]">
    <div class="flex flex-col py-12 transition duration-300 lg:sticky lg:top-0 lg:justify-between">
        <div>
            <h1 class="text-4xl font-bold tracking-tight text-slate-200 sm:text-5xl">
                <span class="block text-slate-200">Welcome</span>
                <span class="block text-teal-300">{{ Auth::user()->name }}</span>
            </h1>
            <h2 class="mt-3 text-lg font-medium tracking-tight text-slate-400 sm:text-xl">{{ $pageName }}</h2>
            <p class="mt-6 text-base leading-7 text-slate-400">
                Manage your portfolio and view your current experience details.
            </p>
        </div>
    </div>
</header>
