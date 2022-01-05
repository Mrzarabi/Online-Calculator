<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Element extends Model
{
    use HasFactory, SearchableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'calculator_id',

        'name',
        'price',
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
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'elements.name' => 10,
            'elements.price' => 10,
            'calculators.name' => 10,
        ],
        'joins' => [
            'calculators' => ['elements.calculator_id', 'calculators.id']
        ],
    ];

    //* Relations

    /**
     * Get the calculator that owns the element
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function calculator()
    {
        return $this->belongsTo(Calculator::class);
    }
}
