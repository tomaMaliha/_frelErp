
<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title> Admin Login</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{asset('public/login/assets/css/dashlite.css?ver=1.8.0')}}">
    <link id="skin-default" rel="stylesheet" href="{{asset('public/login/assets/css/theme.css?ver=1.8.0')}}">
</head>

<body class="nk-body bg-white npc-general pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="brand-logo pb-4 text-center">
                            
                        </div>
                        

                        <div class="card">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="card-body">
                                        @include('admin.partials.alert')
                                    </div> 
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Admin Sign-In</h4>
                                        <div class="nk-block-des">
                                            <p>Access to the ERP panel using your email and password.</p>
                                        </div>
                                    </div>
                                </div>

                                
                                <form method="POST" action="{{ route('admin.login.submit') }}" id="contactForm">
                                    @csrf

                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Email</label>
                                        </div>
                                        <input type="email" name="email" placeholder="Enter your Email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" 
                                        required autocomplete="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email'">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <label class="form-label" for="password">Password</label>
                                                
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                        <div class="form-control-wrap">
                                            <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            {{-- <input type="password" name="password" class="form-control form-control-lg  @error('password') is-invalid @enderror" id="password" placeholder="Enter your passcode"> --}}
                                            <input type="password" name="password" placeholder="Enter your Password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}" 
                                            required autocomplete="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter password'">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block">Sign in</button>
                                    </div>
                                    
                                </form>

                                <div class="form-note-s2 text-center pt-4">
                                </div>
                                
                                {{-- <div class="form-group">
                                    <button class="btn btn-lg btn-primary btn-block">
                                        <a href="{{route('register')}}" style="color: white;">Create New account</a>

                                    </button>
                                </div> --}}
                                <div class="text-center pt-4 pb-3">
                                    <h6 class="overline-title overline-title-sap"><span>OR</span></h6>
                                </div>
                                <ul class="nav justify-center gx-4">
                                    <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Google</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    @include('admin.partials.assets-link.js-links')

    <script src="{{asset('public/login/assets/js/bundle.js?ver=1.8.0')}}"></script>
    <script src="{{asset('public/login/assets/js/scripts.js?ver=1.8.0')}}"></script>

</html>


