<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleComment extends Model
{
    use HasFactory;

    protected $table = 'articles_comments';

    protected $fillable = [
        'user_id',
        'article_id',
        'body'
    ];

    protected $attributes = [
        'status' => 2
    ];

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;



}
