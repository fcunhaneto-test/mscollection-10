@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="columns is-centered mt-6">
        <div class="column is-one-third">
            <div class="card has-border">
                <header class="card-header login-card-header">
                    <h1 class="title is-5 card-header-title">{{ __('Login') }}</h1>
                </header>
                <div class="card-content">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="field">
                            <label for="email" class="label">{{ __('E-Mail Address') }}</label>
                            <div class="control has-icons-left">
                                <input id="email" name="email" class="input" type="text" placeholder="Email" required
                                       tabindex="1" autofocus>
                                <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                                @error('email') <p class="help is-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="field">
                            <label for="password" class="label">{{ __('Password') }}</label>
                            <div class="control has-icons-left">
                                <input id="password" name="password" class="input" type="password"
                                       placeholder="Senha" required tabindex="2">
                                <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>
                                @error('password') <p class="help is-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="field has-text-centered mt-3">
                            <div class="control has-text-centered">
                                <input id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember" class="checkbox ml-2">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control has-text-centered">
                                <button type="submit" class="button is-link">{{ __('Login') }}</button>
                                @if (Route::has('password.request'))
                                    <a class="button is-ghost ml-4" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
