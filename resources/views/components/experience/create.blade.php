<x-layout>
    <x-forms.form method="POST" action="/add-experience" enctype="multipart/form-data">
        <x-forms.input name="website_url" label="Website URL" value="{{ old('website_url') }}" />
        <x-forms.input name="job_title" label="Job Title *" value="{{ old('job_title') }}" required />
        <x-forms.input name="company" label="Company" value="{{ old('company') }}" />
        <x-forms.input name="start_date" label="Start Date" value="{{ old('start_date') }}" />
        <x-forms.input name="end_date" label="End Date" value="{{ old('end_date') }}" />
        <x-forms.textArea name="description" label="Description" value="{{ old('description') }}" required />
        <x-forms.input name="skills_used" label="Skills Used" value="{{ old('skills_used') }}" required />

        <x-forms.divider />

        <x-forms.button>Add Experience</x-forms.button>
    </x-forms.form>
</x-layout>
