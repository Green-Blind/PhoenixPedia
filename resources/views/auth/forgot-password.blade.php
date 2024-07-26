<x-guest-layout>
    <div class="columns is-centered">
        <div class="column is-full-desktop box has-text-centered">
            <h1 class="title has-text-centered">{{ __('Réinitialisation de votre mot de passe') }}</h1>
            <p class="content">{{ __("Vous avez oublié votre mot de passe ? Pas de problème.") }}</p>
            <p class="content">{{ __("Indiquez-nous simplement votre adresse email et nous vous enverrons un lien de réinitialisation qui vous permettra d'en choisir un nouveau.") }}</p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div class="field">
                    <label class="label" for="email">{{ __('Email') }}</label>
                    <div class="control">
                        <input id="email" class="input" type="email" name="email" :value="old('email')" required autofocus>
                    </div>
                    <p class="help is-danger">{{ $errors->first('email') }}</p>
                </div>

                <!-- Réinitialiser votre mot de passe bouton -->
                <div class="field is-grouped is-grouped-centered">
                    <div class="control">
                        <button class="button is-primary is-outlined is-rounded" type="submit">
                            {{ __('Réinitialiser votre mot de passe') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
