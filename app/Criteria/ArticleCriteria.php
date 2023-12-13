<?php

namespace App\Criteria;

use App\Entities\Article;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class ArticleCriteria.
 *
 * @package namespace App\Criteria;
 */
class ArticleCriteria implements CriteriaInterface
{

    private int $user_id;

    function __construct()
    {
        $this->user_id = auth()->id();
    }

    /**
     * Apply criteria in query repository
     *
     * @param Article $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->where('user_id', '=', $this->user_id);
    }
}
