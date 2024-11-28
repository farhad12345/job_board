<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <!-- Name and Email Fields in One Line -->
            <div class="flex space-x-4">
                <div class="w-full">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
            </div>

            <!-- CV Text and Experience Fields in One Line -->
            <div class="flex space-x-4 mt-4">
                <div class="w-full">
                    <x-input-label for="mobile" :value="__('Mobile')" />
                    <x-text-input id="mobile" class="block mt-1 w-full" type="number" name="mobile" :value="old('mobile')" required autocomplete="mobile" />
                    <x-input-error :messages="$errors->get('mobile')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label for="experiance" :value="__('Experience')" />
                    <x-text-input id="experiance" class="block mt-1 w-full" type="text" name="experiance" :value="old('experiance')" required autocomplete="experiance" />
                    <x-input-error :messages="$errors->get('experiance')" class="mt-2" />
                </div>
            </div>

            <!-- Education and Skills Fields in One Line -->
            <div class="flex space-x-4 mt-4">
                <div class="w-full">
                    <x-input-label for="education" :value="__('Education')" />
                    <x-text-input id="education" class="block mt-1 w-full" type="text" name="education" :value="old('education')" required autocomplete="Education" />
                    <x-input-error :messages="$errors->get('education')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label for="skills" :value="__('Skills')" />
                    <x-text-input id="skills" class="block mt-1 w-full" type="text" name="skills" :value="old('skills')" required autocomplete="skills" />
                    <x-input-error :messages="$errors->get('skills')" class="mt-2" />
                </div>
            </div>
            <div class="w-full">
                <x-input-label for="Cv_text" :value="__('CV Text')" />
                <x-text-input id="Cv_text" class="block mt-1 w-full" type="text" name="cv_text" :value="old('Cv_text')" required autocomplete="Cv_text" />
                <x-input-error :messages="$errors->get('Cv_text')" class="mt-2" />
            </div>
            <!-- Password Field (Single Field on its Own Line) -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
        </div>



        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
