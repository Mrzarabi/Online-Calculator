<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ticket_id',
        'starter_id',
        'body',
        'watched',
        'importance',
        'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'is_accept',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relations

    /**
     * Get the ticket that owns the ticket
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    /**
     * Get the tickets for the ticket.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function ticlets() {
        return $this->hasMany(Ticket::class);
    }

    /**
     * Get the starter that owns the ticket
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function starter()
    {
        return $this->belongsTo(Starter::class);
    }
}
