<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="form" novalidate>
        @csrf

        <!-- メールアドレス -->
        <div class="form__item">
            <x-input-label for="email" :value="__('メールアドレス')" class="form__label" /><br>
            <x-text-input id="email" class="form__email-field" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="form__err-msg" />
        </div>

        <!-- パスワード -->
        <div class="form__item">
            <x-input-label for="password" :value="__('パスワード')" class="form__label" /><br>

            <x-text-input id="password" class="form__pass-field"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="form__err-msg" />
        </div>

        <div class="form__item flex">
            <label for="remember_me" class="form__label">
                <input id="remember_me" type="checkbox" class="form__check" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('ログイン状態を保存する') }}</span>
            </label>
            <x-primary-button class="form__submit">
                {{ __('ログイン') }}
            </x-primary-button>
        </div>

        <a href="{{ url('/') }}" class="form__link">戻る</a>

        <!-- <div class="">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div> -->
    </form>
</x-guest-layout>
