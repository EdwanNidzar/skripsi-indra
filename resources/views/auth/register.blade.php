<x-guest-layout>
  <div class="flex flex-col overflow-y-auto md:flex-row">
    <div class="h-32 md:h-auto md:w-1/2">
      <img aria-hidden="true" class="object-cover w-full h-full" src="{{ asset('images/silat.png') }}" alt="Office" />
    </div>

    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
      <div class="w-full">
        <h1 class="mb-4 text-xl font-semibold text-gray-700">
          Create account
        </h1>

        <form method="POST" action="{{ route('register') }}">
          @csrf

          <div class="mt-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input type="text" id="name" name="name" class="block w-full" value="{{ old('name') }}"
              required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
          </div>

          <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input name="email" type="email" class="block w-full" value="{{ old('email') }}" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>

          <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <div class="relative">
              <x-text-input type="password" id="password" name="password" class="block w-full" required />
              <button type="button" onclick="togglePassword('password', 'eye-icon-password')"
                class="absolute inset-y-0 right-0 px-3 py-2">
                <svg id="eye-icon-password" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                  class="size-6">
                  <path
                    d="M3.53 2.47a.75.75 0 0 0-1.06 1.06l18 18a.75.75 0 1 0 1.06-1.06l-18-18ZM22.676 12.553a11.249 11.249 0 0 1-2.631 4.31l-3.099-3.099a5.25 5.25 0 0 0-6.71-6.71L7.759 4.577a11.217 11.217 0 0 1 4.242-.827c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113Z" />
                  <path
                    d="M15.75 12c0 .18-.013.357-.037.53l-4.244-4.243A3.75 3.75 0 0 1 15.75 12ZM12.53 15.713l-4.243-4.244a3.75 3.75 0 0 0 4.244 4.243Z" />
                  <path
                    d="M6.75 12c0-.619.107-1.213.304-1.764l-3.1-3.1a11.25 11.25 0 0 0-2.63 4.31c-.12.362-.12.752 0 1.114 1.489 4.467 5.704 7.69 10.675 7.69 1.5 0 2.933-.294 4.242-.827l-2.477-2.477A5.25 5.25 0 0 1 6.75 12Z" />
                </svg>
              </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
          </div>

          <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <div class="relative">
              <x-text-input type="password" id="password_confirmation" name="password_confirmation" class="block w-full"
                required />
              <button type="button" onclick="togglePassword('password_confirmation', 'eye-icon-password-confirmation')"
                class="absolute inset-y-0 right-0 px-3 py-2">
                <svg id="eye-icon-password-confirmation" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                  fill="currentColor" class="size-6">
                  <path
                    d="M3.53 2.47a.75.75 0 0 0-1.06 1.06l18 18a.75.75 0 1 0 1.06-1.06l-18-18ZM22.676 12.553a11.249 11.249 0 0 1-2.631 4.31l-3.099-3.099a5.25 5.25 0 0 0-6.71-6.71L7.759 4.577a11.217 11.217 0 0 1 4.242-.827c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113Z" />
                  <path
                    d="M15.75 12c0 .18-.013.357-.037.53l-4.244-4.243A3.75 3.75 0 0 1 15.75 12ZM12.53 15.713l-4.243-4.244a3.75 3.75 0 0 0 4.244 4.243Z" />
                  <path
                    d="M6.75 12c0-.619.107-1.213.304-1.764l-3.1-3.1a11.25 11.25 0 0 0-2.63 4.31c-.12.362-.12.752 0 1.114 1.489 4.467 5.704 7.69 10.675 7.69 1.5 0 2.933-.294 4.242-.827l-2.477-2.477A5.25 5.25 0 0 1 6.75 12Z" />
                </svg>
              </button>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
          </div>

          <div class="mt-4">
            <x-primary-button class="block w-full">
              {{ __('Register') }}
            </x-primary-button>
          </div>
        </form>

        <hr class="my-8" />

        <p class="mt-4">
          <a class="text-sm font-medium text-primary-600 hover:underline"
            href="{{ route('login') }}">{{ __('Already registered?') }}</a>
        </p>
      </div>
    </div>
  </div>

  <script>
    function togglePassword(fieldId, iconId) {
      var passwordField = document.getElementById(fieldId);
      var passwordFieldType = passwordField.getAttribute('type');
      var eyeIcon = document.getElementById(iconId);

      if (passwordFieldType === 'password') {
        passwordField.setAttribute('type', 'text');
        eyeIcon.innerHTML = `
                    <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                    <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z" clip-rule="evenodd" />
                `;
      } else {
        passwordField.setAttribute('type', 'password');
        eyeIcon.innerHTML = `
                    <path d="M3.53 2.47a.75.75 0 0 0-1.06 1.06l18 18a.75.75 0 1 0 1.06-1.06l-18-18ZM22.676 12.553a11.249 11.249 0 0 1-2.631 4.31l-3.099-3.099a5.25 5.25 0 0 0-6.71-6.71L7.759 4.577a11.217 11.217 0 0 1 4.242-.827c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113Z" />
                    <path d="M15.75 12c0 .18-.013.357-.037.53l-4.244-4.243A3.75 3.75 0 0 1 15.75 12ZM12.53 15.713l-4.243-4.244a3.75 3.75 0 0 0 4.244 4.243Z" />
                    <path d="M6.75 12c0-.619.107-1.213.304-1.764l-3.1-3.1a11.25 11.25 0 0 0-2.63 4.31c-.12.362-.12.752 0 1.114 1.489 4.467 5.704 7.69 10.675 7.69 1.5 0 2.933-.294 4.242-.827l-2.477-2.477A5.25 5.25 0 0 1 6.75 12Z" />
                `;
      }
    }
  </script>
</x-guest-layout>
