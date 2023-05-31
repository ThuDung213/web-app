@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card rounded-4 bg-auth">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row">
                                <label for="name" class="col-form-label">{{ __('クリエイター名') }}</label>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <input id="name" type="text"
                                        class="form-control rounded-pill @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <label for="email" class="col-form-label">{{ __('メールアドレス') }}</label>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <input id="email" type="email"
                                        class="form-control rounded-pill @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

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
                                        class="form-control rounded-pill @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="row">
                                <label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</label>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <input id="password-confirm" type="password" class="form-control rounded-pill"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div> --}}

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-2">
                                    <button type="submit" class="form-control btn btn-auth submit rounded-pill">
                                        {{ __('登録') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
