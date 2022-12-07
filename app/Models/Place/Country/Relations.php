<?php

namespace App\Models\Place\Country;

use App\Models\Order;

trait Relations {

    // TODO check all the comments in this relations project

    /**
     * 
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}