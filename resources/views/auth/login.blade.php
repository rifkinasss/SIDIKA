@extends('layouts.login')

@section('login')
    <div class="login-box">
        <div class="login-logo">
            <a><img src="{{ asset('assets/img/SIDIKA.png') }}" style="width: 50px"> <b>SIDIKA</b></a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Email" name="nip_or_email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="social-auth-links text-center mb-3">
                        <button type="submit" class="btn btn-block btn-primary">
                            Sign In
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
