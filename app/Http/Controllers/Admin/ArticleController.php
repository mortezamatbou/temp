<?php

namespace App\Http\Controllers\Admin;

use App\Criteria\ArticleCriteria;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Entities\Article;
use App\Repositories\ArticleRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ArticleController extends Controller
{

    /**
     * @var ArticleRepository
     */
    protected $repository;

    function __construct(ArticleRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $articles = $this->repository->my_articles();
        return view('admin.articles', ['articles' => $articles, 'title' => 'Articles']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.article_create', ['title' => 'Add Article']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request): RedirectResponse
    {
        return to_route('admin.articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article): View
    {
        return view('admin.article', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article): RedirectResponse
    {
        return to_route('admin.articles.show', ['article' => $article->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article): RedirectResponse
    {
        return to_route('admin.articles.show', ['article' => $article->id]);
    }
}
