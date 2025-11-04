<x-layout>
    <x-slot:heading>Log in</x-slot:heading>

    <form method="POST" action="/login">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class=" grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="email">email</x-form-label>
                        <div class="mt-2">
                            <x-form-input id="email" name="email" type="email" :value="old('email')" required></x-form-input>
                             <x-form-error name="email"></x-form-error>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input id="password" name="password" type="password" required></x-form-input>
                             <x-form-error name="password"></x-form-error>
                        </div>
                    </x-form-field>
                </div>
            </div>



            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/" type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
                <x-form-button type="submit">Log In</x-form-button>
            </div>
        </div>
    </form>

</x-layout>