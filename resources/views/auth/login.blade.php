@extends('layouts.login')

@section('content')
    <div class="d-flex flex-column flex-lg-row-fluid py-10">
        <div class="d-flex flex-center flex-column flex-column-fluid">
            <!--begin::Wrapper-->
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if ($message = Session::get('error-info'))
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="w-lg-500px p-10 p-lg-15 mx-auto">
                <!--begin::Form-->
                <form method="POST" action="{{ route('login') }}"  class="form w-100" novalidate="novalidate">
                    @csrf
                    <div class="text-center mb-10">
                        <h1 class="text-dark mb-3">Sign In to CITY EDUCATION</h1>
                    </div>

                    <div class="fv-row mb-10">
                        <label class="form-label fs-6 fw-bolder text-dark" for="phone">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" autocomplete="off" />
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="fv-row mb-10">
                        <div class="d-flex flex-stack mb-2">
                            <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                            <a href="" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
                        </div>
                        <input type="password" name="password" class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" required autocomplete="current-password" />
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" id="" class="btn btn-lg btn-primary w-100 mb-5">
                            <span class="">Continue</span>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
