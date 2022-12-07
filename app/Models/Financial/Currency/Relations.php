<?php

namespace App\Models\Financial\Currency;

trait Relations {
     /**
     * Get the elements for the blog calculator.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function elements()
    {
        return $this->hasMany(Element::class);
    }

    /**
     * Get the orders for the blog calculator.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}