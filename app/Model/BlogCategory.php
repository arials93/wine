<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blog_categories';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
    ];
    /**
     * Get the blogs for the blog category.
     */
    public function blogs()
    {
        return $this->hasMany('App\Model\Blog');
    }
        /**
     * Soft Delete to cascade for the sub category
     *
     * @return void
     */
    protected static function booted()
    {
        static::deleting(function ($blog_category) {
            $blog_category->blogs()->delete();
        });
    }
}
