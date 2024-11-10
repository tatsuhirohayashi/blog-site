@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
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
        <div class="body__content-ttl">
            @foreach ($articles as $article)
            <div class="blog">
                <div class="blog__img">
                    <img src="{{ $article['image_url'] }}" alt="代替画像">
                </div>
                <div class="blog__content">
                    <div class="blog__content-title">{{ $article['title'] }}</div>
                    <div class="blog__content-content">{{ mb_substr($article['content'], 0, 30) }}...</div>
                </div>
                <div class="blog__button">
                    <a href="/detail/{{ $article['id'] }}" class="blog__button-detail">詳細</a>
                    @if (Auth::check() && Auth::id() === $article['user_id'])
                    <a href="/edit/{{ $article['id'] }}" class="blog__button-update">更新</a>
                    <a href="/delete/{{ $article['id'] }}" class="blog__button-delete">削除</a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

@endsection