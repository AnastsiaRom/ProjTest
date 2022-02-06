@extends('layouts.app')

@section('content')
    <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-4">
                                <h2 class="text-uppercase text-center mb-5">Авторизация</h2>

                                <form class="form-signup" method="post" action="{{ route('user.signIn') }}">
                                    @csrf
                                    <div class="form-outline mb-2">
                                        <input type="email" id="form3Example3cg" name="email" class="form-control form-control-lg" required="" autofocus="" placeholder="Email" />
                                        <label class="form-label" for="form3Example3cg">Your Email</label>
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-2">
                                        <input type="password" id="form3Example4cg" name="password" class="form-control form-control-lg" required="" size="30" minlength = "8" placeholder="Password" />
                                        <label class="form-label" for="form3Example4cg">Password</label>
                                        @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="sendMe" value="1">Sign In</button>
                                    </div>

                                    <p class="text-center text-muted mt-3 mb-0">Don't have an account? <a href="authent/signUp" class="fw-bold text-body"><u>Register now</u></a></p>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
