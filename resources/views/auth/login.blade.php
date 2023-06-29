@extends('auth.layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card rounded-4 bg-auth">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body ">
                        @if ($errors->has('error'))
                            <div class="alert alert-danger">
                                {{ $errors->first('error') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row">
                                <label for="email" class="col-form-label">{{ __('メールアドレス') }}</label>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <input id="email" type="email"
                                        class="form-control rounded-pill @error('email') is-invalid @enderror"
                                        placeholder="Email" name="email" value="{{ old('email') }}" required
                                        autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <label for="password" class="col-form-label">{{ __('パスワード') }}</label>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <input id="password" type="password"
                                        class="form-control rounded-pill @error('password') is-invalid @enderror"
                                        placeholder="Password" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-8 offset-md-2">
                                    <button type="submit" class="form-control btn btn-auth submit rounded-pill">
                                        {{ __('ログイン') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                            <div class="row mb-0">
                                <div class="form-group d-flex justify-content-between align-items-center">
                                    <!-- Checkbox -->
                                    <div class="form-check mb-0">
                                        <input class="form-check-input me-2" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }} />
                                        <label class="form-check-label" for="remember">
                                            Remember me
                                        </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="text-body btn btn-link">パスワードを忘れた?</a>
                                    @endif
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
