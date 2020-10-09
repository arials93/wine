<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];
     /**
     * Get the sub_categories for the product category.(one to many)
     */
    public function sub_categories()
    {
        return $this->hasMany('App\Model\SubCategory');
    }
    /**
     * Get all of the products for the category.(has many through)
     */
    public function products()
    {
        return $this->hasManyThrough('App\Model\Product', 'App\Model\SubCategory');
    }
    /**
     * Soft Delete to cascade for the sub category
     *
     * @return void
     */
    protected static function booted()
    {
        static::deleting(function ($category) {
            $category->sub_categories()->delete();
        });
    }
}
