@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')

<header class="header">
    <div class="header__inner">
        <div class="header-title">
            Blog Site
        </div>
        <div class="header-link">
            <a href="/" class="header-link-a">Top</a>
            @if (Auth::check())
            <!-- ログインしている場合 -->
            <a href="/post" class="header-link-a">Post</a>
            <form class="form" action="/logout" method="post">
                @csrf
                <button type="submit" class="header-link-button">Logout</button>
            </form>
            @else
            <!-- ログインしていない場合 -->
            <a href="/login" class="header-link-a">Login</a>
            <a href="/register" class="header-link-a">Register</a>
            @endif
        </div>
    </div>
</header>

<body class="body">
    <div class="body__content">
        <div class="body__content-img">
            <img src="{{ asset($article['image_url']) }}" alt="代替画像">
        </div>
        <div class="body__content-title">{{ $article['title'] }}</div>
        <div class="body__content-content">{{ $article['content'] }}</div>
        <div class="body__content-back">
            <a href="/" class="body__content-back-a">戻る</a>
        </div>
    </div>
</body>

@endsection