<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class ordertail
 * @package App\Models
 * @version March 3, 2025, 3:47 pm UTC
 *
 * @property \App\Models\Product $productid
 * @property \App\Models\Scorder $orderid
 * @property integer $productid
 * @property integer $orderid
 * @property integer $quantity
 * @property number $subtotal
 */
class ordertail extends Model
{


    public $table = 'orderdetail';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'productid',
        'orderid',
        'quantity',
        'subtotal'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'productid' => 'integer',
        'orderid' => 'integer',
        'quantity' => 'integer',
        'subtotal' => 'decimal:3'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'productid' => 'nullable|integer',
        'orderid' => 'nullable|integer',
        'quantity' => 'nullable|integer',
        'subtotal' => 'nullable|numeric'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function productid()
    {
        return $this->belongsTo(\App\Models\Product::class, 'productid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function orderid()
    {
        return $this->belongsTo(\App\Models\Scorder::class, 'orderid');
    }
}
