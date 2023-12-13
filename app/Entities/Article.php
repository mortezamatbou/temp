<?php

namespace App\Entities;

use App\Models\ArticleStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Article.
 *
 * @package namespace App\Entities;
 */
class Article extends Model implements Transformable
{
    use TransformableTrait, HasFactory;

    protected $table = 'articles';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $attributes = [
        'status_id' => 1 // 1=active
    ];

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'body'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault([
            'email' => 'ABC'
        ]);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(ArticleStatus::class)->withDefault([
            'status_title' => 'active'
        ]);
    }

}
