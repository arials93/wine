<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'countries';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];
    /**
     * Get the brands for the country.
     */
    public function brands()
    {
        return $this->hasMany('App\Model\Brand');
    }
    /**
     * Get all of the products for the country.(has many through)
     */
    public function products()
    {
        return $this->hasManyThrough('App\Model\Product', 'App\Model\Brand');
    }
    /**
     * Soft Delete to cascade for the country
     * 
     * @return void
     */
    protected static function booted()
    {
        static::deleting(function ($country) {
            $country->brands()->delete();
        });
    }
}
