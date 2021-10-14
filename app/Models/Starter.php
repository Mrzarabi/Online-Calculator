<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Starter extends Model
{
    use HasFactory, SearchableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'answerd',
        'closed',
        'start_no'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'answerd',
        'closed',
        'start_no'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
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
            'starters.start_no' => 10,
            'starters.title' => 10,
            'users.name' => 10,
            'users.family' => 10,
        ],
        'joins' => [
            'users' => ['users.id', 'starters.user_id'],
        ]
    ];
    
    // Relations

    /**
     * Get the user that owns the ticket
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the tickets for the ticket.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function tickets() {
        return $this->hasMany(Ticket::class);
    }
}
