@extends('layouts.auth')
@section('content')

    <div class="main-container">

        <div class="login-pop-up" style="display: none;">
            <div class="welcome-text">Hoşgeldiniz</div>
            <input type="email" name="email" id="login-email">
            <input type="password" name="password" id="login-password">
            <div class="login-pop-up-button">Giriş Yap</div>
        </div>

        <div class="register-pop-up" style="display: none;">
            <div class="welcome-text">Hoşgeldiniz</div>
            <input type="email" name="email" id="login-email">
            <input type="password" name="password" id="login-password">
            <div class="register-pop-up-button">Kayıt Ol</div>
        </div>
    </div>

@endsection

@section('scripts')
@parent

<script>

    $(document).on("click",".login-button, .register-button",function(){
        var show = $(this).data("name") == "login" ? ".login-pop-up" : ".register-pop-up";
        var hide = $(this).data("name") != "login" ? ".login-pop-up" : ".register-pop-up";
        var input = show == ".login-pop-up" ? "login-button" : "register-button";

        var check = $(this).data("check");
        var selector = $(this).css("display");

        if(check == 0) {
            $(this).data("check", 1);
            $(hide).css("display", "none");
            $(input).data("check", 0);
            $(show).css("display", "grid");
        } else {
            $(this).data("check", 0);
            $(show).css("display", "none");
        }
    });

</script>

@endsection

@section('styles')
@parent

<link rel="stylesheet" href="{{ asset("css/auth/login.css") }}">

@endsection
