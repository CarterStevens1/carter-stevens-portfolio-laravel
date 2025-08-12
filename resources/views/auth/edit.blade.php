<x-layout>
    <div>
        <x-forms.form id="update" method="POST" action="/edit" enctype="multipart/form-data">
            <x-forms.input name="name" label="Name" type="text" value="{{ auth()->user()->name }}" />
            <x-forms.input name="current_password" label="Password" type="password" />
            <x-forms.input name="password" label="New password" type="password" />
            <x-forms.input name="password_confirmation" label="Confirm new password" type="password" />

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-success">
                    {{ session('error') }}
                </div>
            @endif
        </x-forms.form>
        <x-forms.divider />
        <div class="mx-auto flex max-w-2xl justify-between space-y-6">
            <button variant="save" form="update">Save</button>
        </div>
    </div>
</x-layout>
