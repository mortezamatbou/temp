<?php

namespace App\Repositories;

use App\Criteria\ArticleCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\Article;

/**
 * Class ArticleRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ArticleRepositoryEloquent extends BaseRepository implements ArticleRepository
{

    protected $fieldSearchable = [
        'title' => 'like',
        'slug' => 'like',
        'status_id' => '='
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Article::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function new_article(array $data)
    {
        $data['user_id'] = auth()->user()->id;
        return $this->create($data);
    }


    public function validator()
    {
    }

    public function my_articles()
    {
        return $this->pushCriteria(new ArticleCriteria())->with(['user', 'status'])->all();
    }

}
