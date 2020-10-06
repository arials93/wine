<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comments';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'product_id', 'blog_id', 'user_id', 
    ];
}
