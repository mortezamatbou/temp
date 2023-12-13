<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleStatus extends Model
{
    use HasFactory;

    protected $table = 'articles_status';

    protected $primaryKey = 'id';

    public $incrementing = true;

    public $timestamps = true;


    public function articles()
    {
        $this->hasMany(\App\Entities\Article::class);
    }


}
