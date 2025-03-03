<?php

namespace App\Repositories;

use App\Models\ordertail;
use App\Repositories\BaseRepository;

/**
 * Class ordertailRepository
 * @package App\Repositories
 * @version March 3, 2025, 3:47 pm UTC
*/

class ordertailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'productid',
        'orderid',
        'quantity',
        'subtotal'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ordertail::class;
    }
}
