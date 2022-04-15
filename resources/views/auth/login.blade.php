@extends('template.master')

@section('content')
    <!-- ======================= Inner intro START ======================= -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 col-xl-6 mx-auto">
                    <div class="p-4 p-sm-5 bg-primary-soft rounded">
                        <h2>Log in to your account</h2>
                        <!-- Form START -->
                        <form class="mt-4" action="{{ route('login') }}" method="post">@csrf
                        <!-- Email -->
                            <div class="mb-3">
                                <label class="form-label" for="InputEmail">Email address</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="InputEmail" placeholder="E-mail">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!-- Password -->
                            <div class="mb-3">
                                <label class="form-label" for="InputPassword">Password</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="InputPassword" placeholder="*********">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!-- Checkbox -->
                            <div class="mb-3 form-check">
                                <input type="checkbox" name="remember" class="form-check-input" id="CheckBox">
                                <label class="form-check-label" for="CheckBox">Remember Me</label>
                            </div>
                            <!-- Button -->
                            <div class="row align-items-center">
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-success">Login</button>
                                </div>
                                @if (Route::has('password.request'))
                                    <div class="col-sm-4">
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
