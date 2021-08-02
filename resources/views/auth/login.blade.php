@extends('layouts.app')

<style>
    .accountbg{
        background: url({{asset('front/assets/login-background.jpg')}}) !important;
        background-size: cover !important;
        background-position: center !important;
    }
</style>

@section('contents')
    <div class="accountbg">

        <div class="content-center">
            <div class="content-desc-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-8">
                            <div class="card">
                                <div class="card-body">

                                    <h3 class="text-center mt-0 m-b-15">
                                        <a href="{{ url('/') }}" class="logo logo-admin"><img src="{{ isset($settings['logo'])?asset($settings['logo']):'' }}" height="30" alt="website logo"></a>
                                    </h3>

                                    <h4 class="text-muted text-center font-18"><b>Sign In</b></h4>

                                    <div class="p-2">
                                        <form class="form-horizontal m-t-20" method="post" action="{{ route('login') }}">
                                            {{ csrf_field() }}

                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                                    @if ($errors->has('password'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="customCheck1">Remember me</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group text-center row m-t-20">
                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
        </div>
    </div>
@endsection
