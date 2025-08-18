<x-layout>
    <div class="w-full lg:flex lg:flex-col lg:gap-4">
        <x-dashboardNav pageName="Create new project" />
        <main class="py-12">
            <x-forms.form method="POST" action="/add-reading" enctype="multipart/form-data">
                <x-forms.input name="blog_url" label="URL" value="{{ old('blog_url') }}" />
                <x-forms.input name="blog_title" label="Blog Title *" value="{{ old('blog_title') }}" required />
                <x-forms.textArea
                    name="blog_description"
                    label="Blog Description"
                    value="{{ old('blog_description') }}"
                    required
                />
                <x-forms.input
                    class="file:bg-violet file:border-violet/10 text-white file:mr-4 file:rounded-xl file:px-4 file:py-2"
                    accept="image/png, image/jpeg, image/webp"
                    type="file"
                    name="blog_image"
                    label="Blog Image"
                    value="{{ old('blog_image') }}"
                />
                <x-forms.input name="blog_date" label="Blog Created Date" value="{{ old('date') }}" required />
                <x-forms.input name="read_date" label="Read Date" value="{{ old('read_date') }}" required />

                <x-forms.divider />

                <x-forms.button>Add project</x-forms.button>
            </x-forms.form>
        </main>
    </div>
</x-layout>
