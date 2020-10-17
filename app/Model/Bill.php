<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bills';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bill_code', 'bill_name', 'bill_phone', 'ship_name', 'ship_phone', 'address', 'email', 'notes', 'ship_date', 'receive_date', 
        'confirm', 'user_id', 'cause', 'is_cancel',
    ];

        /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'ship_date' => 'datetime',
        'receive_date' => 'datetime',
        'confirm' => 'boolean',
        'is_cancel' => 'boolean',
    ];
    /**
     * Get the user that owns the bill.(inverse one to many)
     */
    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }
    /**
     * Get the bill details for the bill.(one to many)
     */
    public function bill_detais()
    {
        return $this->hasMany('App\Model\BillDetail');
    }
    /**
     * The products that belong to the bill.(many to many)
     */
    public function products()
    {
        return $this->belongsToMany('App\Model\Product');
    }
}
