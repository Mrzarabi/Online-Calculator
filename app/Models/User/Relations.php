<?php

namespace App\Models\User;

use App\Http\Livewire\View\Layouts\Form;
use App\Models\Clearing;
use App\Models\location;
use App\Models\Order;
use App\Models\Starter;
use App\Models\Ticket;

trait Relations {
    /**
     * Get the starters for the blog user.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function starters() {
        return $this->hasMany(Starter::class);
    }

    /**
     * Get the ticket for the blog user.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function tickets() {
        return $this->hasMany(Ticket::class);
    }

    /**
     *Get the form for the blog user.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function forms() {
        return $this->hasMany(Form::class);
    }

    /**
     * Get the order for the blog user.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function orders() {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the clearing for the blog user.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function clearings() {
        return $this->hasMany(Clearing::class);
    }

    /**
     * Get the location for the blog user.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function locations() {
        return $this->hasMany(location::class);
    }


}