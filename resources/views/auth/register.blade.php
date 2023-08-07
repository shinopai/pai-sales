<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="form" novalidate>
        @csrf

        <!-- 名前 -->
        <div class="form__item">
            <x-input-label for="name" :value="__('名前')" class="form__label" />
            <x-text-input id="name" class="form__text-field" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="form__err-msg" />
        </div>

        <!-- メールアドレス -->
        <div class="form__item">
            <x-input-label for="email" :value="__('メールアドレス')" class="form__label" />
            <x-text-input id="email" class="form__email-field" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="form__err-msg" />
        </div>

        <!-- パスワード -->
        <div class="form__item">
            <x-input-label for="password" :value="__('パスワード')" class="form__label" />

            <x-text-input id="password" class="form__pass-field"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="form__err-msg" />
        </div>

        <!-- パスワード確認 -->
        <div class="form__item">
            <x-input-label for="password_confirmation" :value="__('パスワード(確認)')" class="form__label" />

            <x-text-input id="password_confirmation" class="form__pass-field"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="form__err-msg" />
        </div>

        <div class="form__item flex">
            <a class="form__link" href="{{ route('login') }}">
                {{ __('既に登録済ですか?') }}
            </a>

            <x-primary-button class="form__submit">
                {{ __('登録') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
