@extends('layouts.login')

@section('login')
    <div class="login-box">
        <div class="login-logo">
            <a><img src="{{ asset('assets/img/SIDIKA.png') }}" style="width: 50px"> <b>SIDIKA</b></a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Please confirm your password before continuing.</p>
                <form action="{{ route('password.confirm') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" required
                            autocomplete="current-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="social-auth-links text-center mb-3">
                        <button type="submit" class="btn btn-block btn-primary">
                            Confirm Password
                        </button>
                    </div>
                    <p class="mb-1">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">I forgot my password</a>
                        @endif
                    </p>
                </form>
            </div>
        </div>
    </div>
@endsection
