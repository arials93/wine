<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bill_details';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quantity', 'price', 'sale', 'total', 'product_id', 'bill_id', 
    ];
    /**
     * Get the bill that owns the bill detail.(inverse one to many)
     */
    public function bill()
    {
        return $this->belongsTo('App\Model\Bill');
    }
    /**
     * Get the product associated with the bill detail.(one to one)
     */
    public function product()
    {
        return $this->hasOne('App\Model\Product', 'id', 'product_id')->withTrashed();
    }
}
