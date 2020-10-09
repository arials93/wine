<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blogs';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'sub_description', 'description', 'image', 'user_id', 'blog_category_id', 
    ];
    /**
     * Get the blog category that owns the blog.(inverse one to many)
     */
    public function blog_category()
    {
        return $this->belongsTo('App\Model\BlogCategory');
    }
    /**
     * Get the user that owns the blog.(inverse one to many)
     */
    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }
}
