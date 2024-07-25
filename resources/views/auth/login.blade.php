<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form class="box is-four-fifths-desktop" method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="field">
            <label class="label" for="email">{{ __('Email') }}</label>
            <div class="control">
                <input class="input" type="email" name="email" id="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email">
            </div>
            <x-input-error :messages="$errors->get('email')" class="help is-danger" />
        </div>

        <!-- Password -->
        <div class="field">
            <label class="label" for="password">{{ __('Mot de Passe') }}</label>
            <div class="control">
                <input class="input" type="password" name="password" id="password" required autocomplete="current-password" placeholder="Password">
            </div>
            <x-input-error :messages="$errors->get('password')" class="help is-danger" />
        </div>

        <!-- Remember Me -->
        <div class="field">
            <div class="control">
                <label class="checkbox" for="remember_me">
                    <input type="checkbox" name="remember" id="remember_me">
                    {{ __('Se souvenir de moi') }}
                </label>
            </div>
        </div>

        <div class="field is-grouped is-grouped-right flex-wrap">
            @if (Route::has('password.request'))
                <div class="control mb-2">
                    <a class="button is-text" href="{{ route('password.request') }}">{{ __('Mot de passe oublié ?') }}</a>
                </div>
            @endif
            <div class="control">
                <button class="button is-primary" type="submit">{{ __('Connexion') }}</button>
            </div>
        </div>
    </form>
</x-guest-layout>
