<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'brands';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'image', 'country_id', 
    ];
    /**
     * Get the country that owns the brand.
     */
    public function country()
    {
        return $this->belongsTo('App\Model\Country');
    }
        /**
     * Get the products for the brand.
     */
    public function products()
    {
        return $this->hasMany('App\Model\Product');
    }
    /**
     * Soft Delete to cascade for the country
     * 
     * @return void
     */
    protected static function booted()
    {
        static::deleting(function ($brand) {
            $brand->products()->delete();
        });
    }
}
