<x-guest-layout>
    <div class="columns is-centered">
        <div class="column is-full-desktop box">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h1 class="title has-text-centered">{{ __('Inscription') }}</h1>

                <!-- Nom -->
                <div class="field">
                    <label class="label" for="name">{{ __('Nom') }}</label>
                    <div class="control has-icons-left">
                        <input class="input" type="text" name="name" id="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Nom">
                        <span class="icon is-small is-left">
                    </div>
                    <p class="help is-danger">{{ $errors->first('name') }}</p>
                </div>

                <!-- Email -->
                <div class="field">
                    <label class="label" for="email">{{ __('Email') }}</label>
                    <div class="control">
                        <input class="input" type="email" name="email" id="email" :value="old('email')" required>
                    </div>
                    <p class="help is-danger">{{ $errors->first('email') }}</p>
                </div>

                <!-- Mot de passe-->
                <div class="field">
                    <label class="label" for="password">{{ __('Mot de passe') }}</label>
                    <div class="control">
                        <input class="input" type="password" name="password" id="password" required autocomplete="new-password">
                    </div>
                    <p class="help is-danger">{{ $errors->first('password') }}</p>
                </div>

                <!-- Confirmation du mot de passe -->
                <div class="field">
                    <label class="label" for="password_confirmation">{{ __('Confirmation du mot de passe') }}</label>
                    <div class="control">
                        <input class="input" type="password" name="password_confirmation" id="password_confirmation" required autocomplete="new-password">
                    </div>
                    <p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>
                </div>

                <!-- Boutons -->
                <div class="field is-grouped is-grouped-centered">
                    <p class="control">
                        <a class="button is-text" href="{{ route('login') }}">{{ __('Déjà inscrit ?') }}</a>
                    </p>
                    <p class="control">
                        <button class="button is-primary is-outlined is-rounded" type="submit">{{ __("S'inscrire") }}</button>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
