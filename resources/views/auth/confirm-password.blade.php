<x-guest-layout>
    <div class="columns is-centered">
        <div class="column is-full-desktop box has-text-centered">
            <h1 class="title is-4 has-text-weight-bold mb-4">Confirmer le mot de passe</h1>
            <p class="content">
                {{ __('Cette section de l\'application est sécurisée. Veuillez confirmer votre mot de passe avant de continuer.') }}
            </p>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <!-- Mot de passe -->
                <div class="field">
                    <label class="label" for="password">{{ __('Mot de passe') }}</label>
                    <div class="control">
                        <input id="password" class="input" type="password" name="password" required autocomplete="current-password">
                    </div>
                    <p class="help is-danger">{{ $errors->first('password') }}</p>
                </div>

                <!-- Bouton de confirmation -->
                <div class="field is-grouped is-grouped-centered">
                    <div class="control">
                        <button class="button is-primary" type="submit">
                            {{ __('Confirmer') }}
                        </button>
                    </div>
                    <p class="help is-danger">{{ $errors->first('password') }}</p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
