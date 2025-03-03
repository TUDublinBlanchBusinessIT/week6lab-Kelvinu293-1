<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class scorder
 * @package App\Models
 * @version March 3, 2025, 3:49 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $orderdetails
 * @property string|\Carbon\Carbon $orderdate
 * @property string $deliverystreet
 * @property string $deliverycity
 * @property string $deliverycounty
 * @property number $ordertotal
 */
class scorder extends Model
{


    public $table = 'scorder';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'orderdate',
        'deliverystreet',
        'deliverycity',
        'deliverycounty',
        'ordertotal'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'orderdate' => 'datetime',
        'deliverystreet' => 'string',
        'deliverycity' => 'string',
        'deliverycounty' => 'string',
        'ordertotal' => 'decimal:3'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'orderdate' => 'nullable',
        'deliverystreet' => 'nullable|string|max:30',
        'deliverycity' => 'nullable|string|max:30',
        'deliverycounty' => 'nullable|string|max:30',
        'ordertotal' => 'nullable|numeric'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orderdetails()
    {
        return $this->hasMany(\App\Models\Orderdetail::class, 'orderid');
    }
}
