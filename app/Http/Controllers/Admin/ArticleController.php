<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Entities\Article;
use App\Models\ArticleStatus;
use App\Repositories\ArticleRepository;
use App\Repositories\ArticleRepositoryEloquent;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Spatie\Activitylog\Models\Activity;

class ArticleController extends Controller
{

    /**
     * @var ArticleRepositoryEloquent
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
        $status_list = ArticleStatus::all();
        $articles = $this->repository->my_articles();
        return view('admin.articles', ['articles' => $articles, 'title' => 'Articles', 'status_list' => $status_list]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $status_list = ArticleStatus::all();
        return view('admin.article_create', ['title' => 'Add Article', 'status_list' => $status_list]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request): RedirectResponse
    {
        $this->repository->new_article($request->validated());
        return to_route('admin.articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article): View
    {
        $status_list = ArticleStatus::all();
        return view('admin.article', compact('article', 'status_list'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article): RedirectResponse
    {
        $this->repository->update($request->validated(), $article->id);
        return to_route('admin.articles.show', ['article' => $article->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article): RedirectResponse
    {
        return to_route('admin.articles.show', ['article' => $article->id]);
    }

    public function test()
    {
        // $user = User::find(8);
        // $user = User::find(6);
        // activity()->causedBy($user)->withProperty('prop1', 'value1')->log('Third Log');
        // $activities = Activity::all()->last();
        // pre_print($activities->getExtraProperty('prop1'));
        // pre_print($activities->properties['prop1']);

        // activity()->withProperties(['name' => 'Morteza', 'action' => 'create articles'])->log('User added new article');

        // Article::destroy(15);

         $last = Activity::all()->last();
         pre_print($last->toArray());

//        /** @var Article $article */
//        $article = Article::find(1);
//        $article->title = 'New Title';
//        $article->save();
//
//        pre_print($article->isDirty('title'));

    }

}
