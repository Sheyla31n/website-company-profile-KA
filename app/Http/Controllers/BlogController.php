<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Article;

class BlogController extends Controller
{
    public function create()
    {
        return view('dashboard', [
            'page' => 'adminWebBlogCreate'
        ]);
    }

    public function edit($id)
    {
        return view('dashboard', [
            'page' => 'adminWebBlogEdit',
            'article' => Article::findOrFail($id)
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'content' => 'required',
        ]);

        $path = $request->file('thumbnail')->store('articles', 'public');

        Article::create([
            'title' => $request->title,
            'thumbnail' => $path,
            'content' => $request->content,
        ]);

        return redirect()
            ->route('dashboard', ['page' => 'admin.web.blog'])
            ->with('success', 'Blog ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        if ($request->hasFile('thumbnail')) {
            Storage::disk('public')->delete($article->thumbnail);
            $article->thumbnail = $request->file('thumbnail')->store('articles', 'public');
        }

        $article->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()
            ->route('dashboard', ['page' => 'adminWebBlog'])
            ->with('success', 'Blog diperbarui');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        Storage::disk('public')->delete($article->thumbnail);
        $article->delete();

        return redirect()
            ->route('dashboard', ['page' => 'adminWebBlog'])
            ->with('success', 'Blog dihapus');
    }
}
