<?php

namespace App\Http\Controllers;

use App\Events\ArticleUpdate;
use App\Http\Resources\ArticleCollection;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\UserCollection;
use App\Jobs\ProcessArticle;
use App\Models\Article;
use App\Models\User;
use App\Traits\FirstTrait;
use Illuminate\Http\Request;

use App\Helpers\TestHelper;

use function App\Helpers\say_hello_json;

class ArticleController extends Controller
{

    use FirstTrait;

    public function list()
    {
        return new ArticleCollection(Article::all());
    }

    public function detail($id)
    {
        $article = Article::findOrFail($id);
        event(new ArticleUpdate($article));
        ProcessArticle::dispatch($article)->onQueue('article');
        return new ArticleResource($article);
    }

    public function users()
    {
        $user = User::paginate(10);
        $collection = new UserCollection($user->loadCount('articles'));
        return $collection->response()->header('X-Value', 'Your X Value');
    }


    public function helper() {
        return say_hello_json(['first_name' => 'Foo', 'last_name' => 'Bar']);
    }

    public function helper2() {
        return TestHelper::say_hello_json();
    }

    public function trait() {
        $user = $this->get_user();
        return response()->json($user);
    }
}
