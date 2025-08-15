<x-layout>
    <div class="w-full lg:flex lg:flex-col lg:gap-4">
        <x-dashboardNav pageName="Create new project" />
        <main class="py-12">
            <x-forms.form method="POST" action="/add-project" enctype="multipart/form-data">
                <x-forms.input name="url" label="URL" value="{{ old('url') }}" />
                <x-forms.input name="title" label="Project Title *" value="{{ old('title') }}" required />
                <x-forms.input name="company" label="Company" value="{{ old('company') }}" />
                <x-forms.textArea name="description" label="Description" value="{{ old('description') }}" required />
                <x-forms.input
                    accept="image/png, image/jpeg, image/webp"
                    type="file"
                    name="image"
                    label="Image"
                    value="{{ old('image') }}"
                />
                <x-forms.input name="skills_used" label="Skills Used" value="{{ old('skills_used') }}" required />
                <x-forms.checkbox name="is_personal_project" label="Is personal project" value="1" />

                <x-forms.divider />

                <x-forms.button>Add project</x-forms.button>
            </x-forms.form>
        </main>
    </div>
</x-layout>
