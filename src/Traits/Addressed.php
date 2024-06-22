<?php

namespace Admin\Extend\AdminAddress\Traits;

use Admin\Extend\AdminShopify\Models\Address;

trait Addressed
{
    /**
     * @return mixed
     */
    public function addresses(): mixed
    {
        return $this->morphMany(Address::class, 'addressed');
    }
}
