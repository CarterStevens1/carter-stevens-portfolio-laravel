@props([
    'experiences',
])
<x-layout>
    <div class="w-full lg:flex lg:flex-col lg:gap-4">
        <x-dashboardNav pageName="Edit experience" />
        <main class="py-12">
            <x-forms.form
                id="update"
                method="POST"
                action="/experience/{{ $experiences->id }}/edit"
                enctype="multipart/form-data"
            >
                <x-forms.input name="website_url" label="Website URL" value="{{ $experiences->website_url }}" />
                <x-forms.input name="job_title" label="Job Title *" value="{{ $experiences->job_title }}" required />
                <x-forms.input name="company" label="Company" value="{{ $experiences->company }}" />
                <x-forms.input name="start_date" label="Start Date" value="{{ $experiences->start_date }}" />
                <x-forms.input name="end_date" label="End Date" value="{{ $experiences->end_date }}" />
                <x-forms.textArea name="description" label="Description" required>
                    {{ $experiences->description }}
                </x-forms.textArea>
                <x-forms.input
                    name="skills_used"
                    label="Skills Used"
                    value="{{ $experiences->skills_used }}"
                    required
                />

                <x-forms.divider />

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('Update board details successfully.') }}
                    </div>
                @endif
            </x-forms.form>
            <div class="mx-auto flex max-w-2xl justify-between space-y-6">
                <x-forms.button form="update">Save</x-forms.button>

                {{-- Get confirmation to deleten before deleting --}}
                <form id="delete" method="POST" action="/experience/{{ $experiences->id }}/delete">
                    @csrf
                    @method('POST')
                    <button
                        onclick="return confirm('Are you sure you want to delete the experience?')"
                        form="delete"
                        class="mx-0 flex cursor-pointer gap-2 rounded bg-red-500 px-6 py-2 font-bold text-white"
                    >
                        {{-- <x-svgs.bin /> --}}
                        Delete Experience
                    </button>
                </form>
            </div>

            <div class="mx-auto flex max-w-2xl flex-col gap-4 pt-12">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-success text-red-500">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </main>
    </div>
</x-layout>
