@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')

<header class="header">
    <div class="header__inner">
        <div class="header-title">
            Blog Site
        </div>
        <div class="header-link">
            <a href="/" class="header-link-a">Top</a>
            <a href="/login" class="header-link-a">Login</a>
            <a href="/register" class="header-link-a">Register</a>
        </div>
    </div>
</header>

<body class="body">
    <div class="body__content">
        <div class="register__content-ttl">
            <div class="register__content-header">
                <h2 class="register__content-header-h2">Registration</h2>
            </div>
            <div class="register__content-body">
                <form class="form" action="/register" method="post">
                    @csrf
                    <div class="form__group">
                        <div class="form__group-content">
                            <div class="form__input--text">
                                <input type="text" name="name" class="form__input--text-username" placeholder="Username" value="{{ old('name') }}" />
                            </div>
                            <div class="form__error">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form__group">
                        <div class="form__group-content">
                            <div class="form__input--text">
                                <input type="email" name="email" class="form__input--text-email" placeholder="Email" value="{{ old('email') }}" />
                            </div>
                            <div class="form__error">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form__group">
                        <div class="form__group-content">
                            <div class="form__input--text">
                                <input type="password" name="password" class="form__input--text-password" placeholder="Password" value="{{ old('password') }}" />
                            </div>
                            <div class="form__error">
                                @error('password')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form__button">
                        <button class="form__button-submit" type="submit">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

@endsection