<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

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

}
