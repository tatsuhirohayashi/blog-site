@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
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
        <form class="form" action="/edit/{{ $article['id'] }}" method="post" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <h2 class="body__content-title"><span class="required">※</span>●タイトル</h2>
            <input class="body__content-title-input" type="text" name="title" value="{{ old('title', $article['title']) }}" placeholder="タイトルを入力してください">
            <div class="form__error">
                @error('title')
                {{ $message }}
                @enderror
            </div>
            <h2 class="body__content-img">●画像</h2>
            <div class="body__content-img-preview">
                <p class="body__content-img-preview-p">現在の画像：</p>
                <img src="{{ asset($article->image_url) }}" alt="代替画像">
            </div>
            <div class="file-upload">
                <input class="body__content-img-input" type="file" id="imageUpload" name="image_url">
                <label for="imageUpload" class="custom-file-upload">
                    クリックして写真を追加<br>またはドラッグアンドドロップ
                </label>
            </div>
            <div class="form__error">
                @error('image_url')
                {{ $message }}
                @enderror
            </div>
            <h2 class="body__content-content"><span class="required">※</span>●本文</h2>
            <textarea class="body__content-content-textarea" rows="20" type="text" name="content" placeholder="ブログの本文を入力してください" value="">{{ old('content', $article['content']) }}</textarea>
            <div class="form__error">
                @error('content')
                {{ $message }}
                @enderror
            </div>
            <div class="body__content-button">
                <button class="body__content-submit">編集する</button>
            </div>
        </form>
    </div>
</body>

@endsection