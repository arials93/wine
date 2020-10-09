<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'barcode', 'abv', 'vintage', 'image', 'price', 'sale', 'description', 'instock', 'bestseller',
        'brand_id', 'sub_category_id', 'size_id',
    ];
    /**
     * Get the size that owns the product.(inverse one to many )
     */
    public function size()
    {
        return $this->belongsTo('App\Model\Size');
    }
    /**
     * Get the brand that owns the product.
     */
    public function brand()
    {
        return $this->belongsTo('App\Model\Brand');
    }
    /**
     * Get the sub category that owns the product.
     */
    public function sub_category()
    {
        return $this->belongsTo('App\Model\SubCategory');
    }
    /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    
}
