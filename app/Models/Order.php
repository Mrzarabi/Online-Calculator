<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Order extends Model
{
    use HasFactory, SearchableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'input_currency_type',
        'input_number',
        'input_currency_unit',

        'output_currency_type',
        'output_number',
        'output_currency_unit',

        'accept',
        'order_no'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'order_no'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'accept' => 'boolean'
    ];

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'orders.order_no' => 10,
            'calculators.name' => 10,
            'elements.name' => 10,
            'orders.input_number' => 9,
            'orders.output_number' => 8,
        ],
        'joins' => [
            'calculators' => ['calculators.id', 'orders.input_currency_type'],
            'elements' => ['elements.id', 'orders.output_currency_type'],
        ],
    ];

    // Relations

    /**
     * Get the user that owns the form
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user that owns the form
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clearing()
    {
        return $this->hasOne(Clearing::class);
    }

    /**
     * Get the user that owns the form
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function form()
    {
        return $this->hasOne(Form::class);
    }
}
