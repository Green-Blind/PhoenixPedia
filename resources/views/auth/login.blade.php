<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="columns is-centered">
        <div class="column is-full-desktop box scrollable-form">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1 class="title has-text-centered">{{ __('Se connecter') }}</h1>

                <!-- Email Address -->
                <div class="field">
                    <label class="label" for="email">{{ __('Email') }}</label>
                    <div class="control has-icons-left">
                        <input class="input" type="email" name="email" id="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email">
                        <span class="icon is-small is-left">
                      <i class="fas fa-envelope"></i>
                    </span>
                    </div>
                    <p class="help is-danger">{{ $errors->first('email') }}</p>
                </div>

                <!-- Password -->
                <div class="field">
                    <label class="label" for="password">{{ __('Mot de passe') }}</label>
                    <div class="control has-icons-left">
                        <input class="input" type="password" name="password" id="password" required autocomplete="current-password" placeholder="Mot de passe">
                        <span class="icon is-small is-left">
                      <i class="fas fa-lock"></i>
                    </span>
                    </div>
                    <p class="help is-danger">{{ $errors->first('password') }}</p>
                </div>

                <div class="field">
                    <div class="control">
                        <label class="checkbox" for="remember_me">
                            <input type="checkbox" name="remember" id="remember_me">
                            {{ __('Se souvenir de moi') }}
                        </label>
                    </div>
                </div>

                <div class="has-text-centered">
                    <button class="button is-primary is-outlined is-rounded" type="submit">{{ __('Connexion') }}</button>
                    @if (Route::has('password.request'))
                        <a class="button is-text" href="{{ route('password.request') }}">{{ __('Mot de passe oublié ?') }}</a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
