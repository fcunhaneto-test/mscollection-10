@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="columns is-centered login-view">
        <div class="column is-one-third">
            <div class="card has-border">
                <header class="card-header login-card-header">
                    <h1 class="title is-5 card-header-title">{{ __('Register') }}</h1>
                </header>
                <div class="card-content">
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="field">
                                <label for="name" class="label">{{ __('Name') }}</label>
                                <div class="control has-icons-left">
                                    <input id="name" name="name" class="input" type="text" placeholder="Seu Nome"
                                           required tabindex="1" autofocus>
                                    <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                                    @error('name') <p class="help is-danger">{{ $message }}</p> @enderror
                                </div>
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
                                               required tabindex="2">
                                        <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>
                                        @error('password') <p class="help is-danger">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                                <div class="field">
                                    <label for="password-confirm" class="label">{{ __('Password') }}</label>
                                    <div class="control has-icons-left">
                                        <input id="password-confirm" name="password_confirmation" class="input"
                                               type="password" equired tabindex="2">
                                        <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control has-text-centered">
                                        <button type="submit" class="button is-link">{{ __('Register') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
