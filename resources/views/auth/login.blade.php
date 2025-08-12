<x-layout>
    <section class="mx-auto w-full max-w-2xl space-y-6">
        <x-forms.form method="POST" action="/adminPanel" enctype="multipart/form-data">
            <x-forms.input name="email" label="Email" type="text" />
            <x-forms.input name="password" label="Password" type="password" />

            <x-forms.button>Log in</x-forms.button>
        </x-forms.form>
    </section>
</x-layout>
