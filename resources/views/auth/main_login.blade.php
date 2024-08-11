
<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />

         {{-- css files --}}
         @include('backEnd.inc.css_file')
    </head>

    <body>

    <!-- <body data-layout="horizontal"> -->
        <div class="auth-page d-flex justify-content-center">
                    <div class="col-xxl-3 col-lg-4 col-md-5">
                        <div class="auth-full-page-content d-flex p-sm-5 p-3">
                            <div class="w-100">
                                <div class="d-flex flex-column h-100">
                                    <div class="mb-2 mb-md-3 text-center">
                                        <a href="index.html" class="d-block auth-logo">
                                            <img src="{{ asset('assets/images/logo-sm.svg') }}" alt="" height="28"> <span class="logo-txt">Admin - panel</span>
                                        </a>
                                    </div>
                                    <div class="auth-content my-auto">
                                        <div class="text-center">
                                            <h5 class="mb-0">Welcome Back !</h5>
                                            <p class="text-muted mt-2">Sign in to continue.</p>
                                        </div>
                                        <form class="mt-4 pt-2" action="{{ route('login') }}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label">Enter Your E-mail</label>
                                                <input type="email" class="form-control" name="email" placeholder="enter e-mail" value="{{ old('email') }}">

                                                @error('email')
                                                    <p class="text-danger">{{ $message }}</p>    
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-grow-1">
                                                        <label class="form-label">Password</label>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="">
                                                            <a href="auth-recoverpw.html" class="text-muted">Forgot password?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div444 class="input-group auth-pass-inputgroup">
                                                    <input type="password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon" name="password">
                                                    <button class="btn btn-light shadow-none ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>

                                                    @error('password')
                                                    <p class="text-danger">{{ $message }}</p>    
                                                     @enderror
                                                </div444>
                                            </div>
                                            <div class="mb-3">
                                                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
                                            </div>
                                        </form>

                                        <div class="mt-5 text-center">
                                            <p class="text-muted mb-0">Don't have an account ? <a href="auth-register.html"
                                                    class="text-primary fw-semibold"> Signup now </a> </p>
                                        </div>
                                    </div>
                                    <div class="mt-4 mt-md-5 text-center">
                                        <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Powered by <i class="mdi mdi-heart text-danger"></i> Raj IT</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end auth full page content -->
                    </div>
                <!-- end row -->
            <!-- end container fluid -->
        </div>

        {{-- js file --}}
        @include('backEnd.inc.js_file')
    </body>

</html>