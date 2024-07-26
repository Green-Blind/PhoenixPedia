<x-guest-layout>
    <div class="columns is-centered">
        <div class="column is-full-desktop box">
            <form method="POST" action="{{ route('password.store') }}">
                @csrf
                <h1 class="title has-text-centered">{{ __('Inscription') }}</h1>

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div class="field">
                    <label class="label" for="email">{{ __('Email') }}</label>
                    <div class="control">
                        <input id="email" class="input" type="email" name="email" :value="old('email', $request->email)" required autocomplete="email">
                    </div>
                    <p class="help is-danger">{{ $errors->first('email') }}</p>
                </div>

                <!-- Password -->
                <div class="field">
                    <label class="label" for="password">{{ __('Mot de passe') }}</label>
                    <div class="control">
                        <input id="password" class="input" type="password" name="password" required autocomplete="new-password">
                    </div>
                    <p class="help is-danger">{{ $errors->first('password') }}</p>
                </div>

                <!-- Confirm Password -->
                <div class="field">
                    <label class="label" for="password_confirmation">{{ __('Confirmer le mot de passe') }}</label>
                    <div class="control">
                        <input id="password_confirmation" class="input" type="password" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <!-- Bouton "Réinitialiser le mot de passe"-->
                <div class="field is-grouped is-grouped-centered">
                    <div class="control">
                        <button class="button is-primary" type="submit">{{ __('Réinitialiser le Mot de Passe') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
