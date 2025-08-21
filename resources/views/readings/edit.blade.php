@props([
    'readings',
])
<x-layout>
    <div class="w-full lg:flex lg:flex-col lg:gap-4">
        <x-dashboardNav pageName="Edit projects" />
        <main class="py-12">
            <x-forms.form
                id="update"
                method="POST"
                action="/reading/{{ $readings->id }}/edit"
                enctype="multipart/form-data"
            >
                <x-forms.input name="blog_url" label="Blog URL" value="{{ $readings->blog_url }}" />
                <x-forms.input name="blog_title" label="Blog Title *" value="{{ $readings->blog_title }}" required />
                <x-forms.textArea name="blog_description" label="Blog Description" required>
                    {{ $readings->blog_description }}
                </x-forms.textArea>
                <div class="mb-4">
                    <label class="mb-2 block text-sm font-medium text-gray-700">Current Image</label>
                    <div class="rounded-lg border-2 border-dashed border-gray-300 p-4">
                        @if ($readings->blog_image && asset('images/' . $readings->blog_image))
                            <div class="relative">
                                <img
                                    src="{{ asset('images/' . $readings->blog_image) }}"
                                    alt="Current image"
                                    class="mx-auto h-48 max-w-full rounded object-contain"
                                    id="currentImage"
                                />
                            </div>
                            <p class="mt-2 text-center text-sm text-gray-500">{{ basename($readings->image_path) }}</p>
                        @else
                            <div class="text-center text-gray-500">
                                <p>No image uploaded</p>
                            </div>
                        @endif
                    </div>
                </div>
                <x-forms.input
                    class="file:bg-violet file:border-violet/10 text-white file:mr-4 file:rounded-xl file:px-4 file:py-2"
                    accept="image/png, image/jpeg, image/webp"
                    type="file"
                    name="blog_image"
                    label=" {{ $readings->blog_image ? 'Replace Image (Optional)' : 'Upload Image' }}"
                    value="{{ old('blog_image') }}"
                />
                <x-forms.input
                    type="date"
                    name="blog_date"
                    label="Blog Created Date"
                    value="{{ $readings->blog_date }}"
                    required
                />
                <x-forms.input
                    type="date"
                    name="read_date"
                    label="Read Date"
                    value="{{ $readings->read_date }}"
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
                <form id="delete" method="POST" action="/project/{{ $readings->id }}/delete">
                    @csrf
                    @method('POST')
                    <button
                        onclick="return confirm('Are you sure you want to delete the blog?')"
                        form="delete"
                        class="mx-0 flex cursor-pointer gap-2 rounded bg-red-500 px-6 py-2 font-bold text-white"
                    >
                        {{-- <x-svgs.bin /> --}}
                        Delete blog
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
