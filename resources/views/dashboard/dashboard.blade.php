<x-layout>
    <div class="w-full lg:flex lg:flex-col lg:gap-4">
        <x-dashboardNav pageName="Dashboard" />
        <main class="grid grid-cols-2 items-center py-12">
            <!-- Dashboard Actions Card -->
            <div class="mb-8 w-full max-w-md">
                <div class="rounded-lg bg-slate-800/50 p-6 ring-1 ring-slate-700/50">
                    <h3 class="mb-4 text-lg font-semibold text-slate-200">Experiences</h3>
                    <div class="space-y-3">
                        <a
                            href="{{ route('experience.index') }}"
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
                    </div>
                </div>
            </div>
            <div class="mb-8 w-full max-w-md">
                <div class="rounded-lg bg-slate-800/50 p-6 ring-1 ring-slate-700/50">
                    <h3 class="mb-4 text-lg font-semibold text-slate-200">Project List (TODO)</h3>
                    <div class="space-y-3">
                        <a
                            href="{{ route('project.index') }}"
                            class="block w-full rounded-md bg-teal-600 px-4 py-2 text-center text-sm font-medium text-white transition-colors hover:bg-teal-500"
                        >
                            View Current projects
                        </a>
                        <a
                            href="{{ route('project.create') }}"
                            class="block w-full rounded-md border border-slate-600 px-4 py-2 text-center text-sm font-medium text-slate-200 transition-colors hover:bg-slate-700"
                        >
                            Add New project
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-layout>
