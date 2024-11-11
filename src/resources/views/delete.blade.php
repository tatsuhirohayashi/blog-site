@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/delete.css') }}">
@endsection

@section('content')

<header class="header">
    <div class="header__inner">
        <div class="header-title">
            Blog Site
        </div>
        <div class="header-link">
            <a href="/" class="header-link-a">Top</a>
            <a href="/post" class="header-link-a">Post</a>
            <form class="form" action="/logout" method="post">
                @csrf
                <button type="submit" class="header-link-button">Logout</button>
            </form>
        </div>
    </div>
</header>

<body class="body">
    <div class="body__content">
        <form class="form" action="/delete/{{ $article['id'] }}" method="post" enctype="multipart/form-data">
            @method('DELETE')
            @csrf
            <h2 class="body__content-title">●タイトル</h2>
            <input class="body__content-title-input" type="text" name="title" value="{{ old('title', $article['title']) }}" placeholder="タイトルを入力してください" readonly>
            <h2 class="body__content-img">●画像</h2>
            <div class="body__content-img-preview">
                <p class="body__content-img-preview-p">現在の画像：</p>
                <img src="{{ asset($article->image_url) }}" alt="代替画像">
            </div>
            <h2 class="body__content-content">●本文</h2>
            <textarea class="body__content-content-textarea" rows="20" type="text" name="content" placeholder="ブログの本文を入力してください" value="" readonly>{{ old('content', $article['content']) }}</textarea>
            <div class="body__content-button">
                <button class="body__content-submit">削除する</button>
            </div>
        </form>
    </div>
</body>

@endsection