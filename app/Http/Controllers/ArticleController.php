<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::query();

        if ($request->search) {
            $query->where(
                'title',
                'like',
                '%' . $request->search . '%'
            );
        }

        if ($request->category) {
            $query->where(
                'category',
                $request->category
            );
        }

        $articles = $query
            ->orderByDesc('views')
            ->paginate(12);

        $categories = Article::select('category')
            ->distinct()
            ->pluck('category');

        return view(
            'articles.index',
            compact(
                'articles',
                'categories'
            )
        );
    }

    public function read($id)
    {
        $article = Article::findOrFail($id);

        $article->increment('views');

        return redirect($article->link);
    }
}