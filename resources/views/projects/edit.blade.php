@props([
    'project',
])
<x-layout>
    <div class="w-full lg:flex lg:flex-col lg:gap-4">
        <x-dashboardNav pageName="Edit projects" />
        <main class="py-12">
            <x-forms.form
                id="update"
                method="POST"
                action="/project/{{ $project->id }}/edit"
                enctype="multipart/form-data"
            >
                <x-forms.input name="url" label="URL" value="{{ $project->url }}" />
                <x-forms.input name="title" label="Project Title *" value="{{ $project->title }}" required />
                <x-forms.input name="company" label="Company" value="{{ $project->company }}" />
                <x-forms.input name="description" label="Description" value="{{ $project->description }}" required />
                <div class="mb-4">
                    <label class="mb-2 block text-sm font-medium text-gray-700">Current Image</label>
                    <div class="rounded-lg border-2 border-dashed border-gray-300 p-4">
                        @if ($project->image && asset('images/' . $project->image))
                            <div class="relative">
                                <img
                                    src="{{ asset('images/' . $project->image) }}"
                                    alt="Current image"
                                    class="mx-auto h-48 max-w-full rounded object-contain"
                                    id="currentImage"
                                />
                            </div>
                            <p class="mt-2 text-center text-sm text-gray-500">{{ basename($project->image_path) }}</p>
                        @else
                            <div class="text-center text-gray-500">
                                <p>No image uploaded</p>
                            </div>
                        @endif
                    </div>
                </div>
                <x-forms.input
                    accept="image/png, image/jpeg, image/webp"
                    type="file"
                    name="image"
                    label=" {{ $project->image ? 'Replace Image (Optional)' : 'Upload Image' }}"
                    value="{{ old('image') }}"
                />
                <x-forms.input name="skills_used" label="Skills Used" value="{{ $project->skills_used }}" required />
                <x-forms.checkbox
                    name="is_personal_project"
                    label="Is personal project"
                    value="{{ $project->is_personal_project }}"
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
                <form id="delete" method="POST" action="/project/{{ $project->id }}/delete">
                    @csrf
                    @method('POST')
                    <button
                        onclick="return confirm('Are you sure you want to delete the project?')"
                        form="delete"
                        class="mx-0 flex cursor-pointer gap-2 rounded bg-red-500 px-6 py-2 font-bold text-white"
                    >
                        {{-- <x-svgs.bin /> --}}
                        Delete Project
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
