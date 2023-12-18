<?php

namespace App\Observers;

use App\Entities\Article;

class ArticleObserver
{
    /**
     * Handle the Article "created" event.
     */
    public function created(Article $article): void
    {
        //
    }

    /**
     * Handle the Article "updated" event.
     */
    public function updated(Article $article): void
    {
        $properties = [];

        if ($article->isDirty('title')) {
            $properties['attributes']['title'] = $article->title;
            $properties['old']['title'] = $article->getOriginal('title');
        }
        if ($article->isDirty('status_id')) {
            $properties['attributes']['status_id'] = $article->status_id;
            $properties['old']['status_id'] = $article->getOriginal('status_id');
        }
        if ($article->isDirty('slug')) {
            $properties['attributes']['slug'] = $article->slug;
            $properties['old']['slug'] = $article->getOriginal('slug');
        }
        if ($article->isDirty('body')) {
            $properties['attributes']['body'] = $article->body;
            $properties['old']['body'] = $article->getOriginal('body');
        }

        if ($properties) {
            activity('article-observer')
                ->performedOn($article)
                ->causedBy(auth()->id())
                ->withProperties($properties)
                ->log('article updated.');
        }

    }

    /**
     * Handle the Article "deleted" event.
     */
    public function deleted(Article $article): void
    {
        //
    }

    /**
     * Handle the Article "restored" event.
     */
    public function restored(Article $article): void
    {
        //
    }

    /**
     * Handle the Article "force deleted" event.
     */
    public function forceDeleted(Article $article): void
    {
        //
    }
}
