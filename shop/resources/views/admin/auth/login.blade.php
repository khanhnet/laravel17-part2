{{-- <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <title>Đăng nhập</title>
    <style type="text/css">
        body{
     background: url(http://www.timurtek.com/wp-content/uploads/2014/10/form-bg.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  font-family:'HelveticaNeue','Arial', sans-serif;

}
a{color:#58bff6;text-decoration: none;}
a:hover{color:#aaa; }
.pull-right{float: right;}
.pull-left{float: left;}
.clear-fix{clear:both;}
div.logo{text-align: center; margin: 20px 20px 30px 20px; fill: #566375;}
div.logo svg{
    width:180px;
    height:100px;
}
.logo-active{fill: #44aacc !important;}
#formWrapper{
    background: rgba(0,0,0,.2); 
    width:100%; 
    height:100%; 
    position: absolute; 
    top:0; 
    left:0;
    transition:all .3s ease;}
.darken-bg{background: rgba(0,0,0,.5) !important; transition:all .3s ease;}

div#form{
    position: absolute;
    width:360px;
    height:320px;
    height:auto;
    background-color: #fff;
    margin:auto;
    border-radius: 5px;
    padding:20px;
    left:50%;
    top:50%;
    margin-left:-180px;
    margin-top:-200px;
}
div.form-item{position: relative; display: block; margin-bottom: 20px;}
 input{transition: all .2s ease;}
 input.form-style{
    color:#8a8a8a;
    display: block;
    width: 90%;
    height: 44px;
    padding: 5px 5%;
    border:1px solid #ccc;
    -moz-border-radius: 27px;
    -webkit-border-radius: 27px;
    border-radius: 27px;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    background-color: #fff;
    font-family:'HelveticaNeue','Arial', sans-serif;
    font-size: 105%;
    letter-spacing: .8px;
}
div.form-item .form-style:focus{outline: none; border:1px solid #58bff6; color:#58bff6; }
div.form-item p.formLabel {
    position: absolute;
    left:26px;
    top:2px;
    transition:all .4s ease;
    color:#bbb;}
.formTop{top:-22px !important; left:26px; background-color: #fff; padding:0 5px; font-size: 14px; color:#58bff6 !important;}
.formStatus{color:#8a8a8a !important;}
input[type="submit"].login{
    float:right;
    width: 112px;
    height: 37px;
    -moz-border-radius: 19px;
    -webkit-border-radius: 19px;
    border-radius: 19px;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    background-color: #55b1df;
    border:1px solid #55b1df;
    border:none;
    color: #fff;
    font-weight: bold;
}
input[type="submit"].login:hover{background-color: #fff; border:1px solid #55b1df; color:#55b1df; cursor:pointer;}
input[type="submit"].login:focus{outline: none;}

    </style>
</head>
<body>
<script src="https://code.jquery.com/jquery-2.1.0.min.js" ></script>
<div id="formWrapper">

<div id="form">
<div class="logo">
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 458.8 167.5" enable-background="new 0 0 458.8 167.5" xml:space="preserve">
<h1>KN shop</h1>
</svg>
</div>
<form method="POST" action="{{ route('login') }}">
        <div class="form-item">
            <p class="formLabel">Email</p>
            <input type="email" name="email" id="email" class="form-style" required autocomplete="email" autofocus/>
        </div>
        <div class="form-item">
            <p class="formLabel">Password</p>
            <input type="password" name="password" id="password" class="form-style" required autocomplete="current-password" />
            <!-- <div class="pw-view"><i class="fa fa-eye"></i></div> -->
            <p><a href="{{ route('password.request') }}" ><small>Quên mật khẩu ?</small></a></p>    
        </div>
        <div class="form-item">
        <input type="submit" class="login pull-right" value="Log In">
        <div class="clear-fix"></div>
        </div>
        </form>
</div>
</div>
<script>
    $(document).ready(function(){
    var formInputs = $('input[type="email"],input[type="password"]');
    formInputs.focus(function() {
       $(this).parent().children('p.formLabel').addClass('formTop');
       $('div#formWrapper').addClass('darken-bg');
       $('div.logo').addClass('logo-active');
    });
    formInputs.focusout(function() {
        if ($.trim($(this).val()).length == 0){
        $(this).parent().children('p.formLabel').removeClass('formTop');
        }
        $('div#formWrapper').removeClass('darken-bg');
        $('div.logo').removeClass('logo-active');
    });
    $('p.formLabel').click(function(){
         $(this).parent().children('.form-style').focus();
    });
});
</script>
</body>
</html> --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
