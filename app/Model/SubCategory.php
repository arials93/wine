<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sub_categories';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'image', 'category_id', 
    ];
    /**
     * Get the category that owns the sub category.
     */
    public function category()
    {
        return $this->belongsTo('App\Model\Category');
    }
    /**
     * Get the products for the sub category.
     */
    public function products()
    {
        return $this->hasMany('App\Model\Product');
    }
    /**
     * Soft Delete to cascade for the product
     *
     * @return void
     */
    protected static function booted()
    {
        static::deleting(function ($sub_category) {
            $sub_category->products()->delete();
        });
    }
}
