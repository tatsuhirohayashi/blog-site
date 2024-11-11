<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        return view('index', compact('articles'));
    }

    public function detail($id)
    {
        $article = Article::findOrFail($id);

        return view('detail', compact('article'));
    }

    public function showPost()
    {
        return view('post');
    }

    public function post(PostRequest $request)
    {
        $article = new Article();
        $article->user_id = Auth::id();
        $article->title = $request->input('title');
        $article->content = $request->input('content');

        // 画像がアップロードされた場合
        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $filename = time() . '_' . $file->getClientOriginalName(); // タイムスタンプを追加してファイル名をユニークにする
            $path = 'public/articles/' . $filename;

            // ストレージに画像を保存し、URLパスを設定
            Storage::put($path, file_get_contents($file));
            $article->image_url = 'storage/articles/' . $filename;
        } else {
            // 画像がアップロードされなかった場合の処理
            $article->image_url = 'blogs-images/no-image.jpg';
        }

        $article->save();

        return redirect('/');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);

        return view('edit', compact('article'));
    }

    public function update(PostRequest $request, $id)
    {
        $article = Article::findOrFail($id);

        $article->title = $request->input('title');
        $article->content = $request->input('content');

        // 画像がアップロードされた場合
        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $filename = time() . '_' . $file->getClientOriginalName(); // タイムスタンプを追加してファイル名をユニークにする
            $path = 'public/articles/' . $filename;

            // ストレージに画像を保存し、URLパスを設定
            Storage::put($path, file_get_contents($file));
            $article->image_url = 'storage/articles/' . $filename;
        }

        $article->save();

        return redirect('/');
    }

    public function delete($id)
    {
        $article = Article::findOrFail($id);

        return view('delete', compact('article'));
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect('/');
    }
}
