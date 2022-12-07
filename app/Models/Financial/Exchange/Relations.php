<?php

namespace App\Models\Financial\Exchange;

use App\Models\Financial\Currency\Currency;
use App\Models\Order;

trait Relations {
    /**
     * Get the calculator that owns the element
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     * Get the orders for the blog element.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}