@extends('layouts.auth')
@section('content')

    <div class="main-container">
        <div class="login-container">
            <div class="welcome-text">Hoşgeldiniz</div>
            <input type="email" name="" id="email">
            <input type="password" name="" id="password">
            <div class="login">Giriş Yap</div>
            <div class="register">Kayıt Ol</div>
        </div>
    </div>

@endsection

@section('scripts')
@parent

@endsection

@section('styles')
@parent

<link rel="stylesheet" href="{{ asset("css/auth/login.css") }}">

@endsection
