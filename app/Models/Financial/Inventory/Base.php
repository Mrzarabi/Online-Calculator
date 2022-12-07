<?php

namespace App\Models\Financial\Inventory;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'paypal_inventory',
        'cash_inventory',
        'perfect_money_inventory',
        'web_money_inventory',
        'tether_inventory',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
}