<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use Nicolaslopezj\Searchable\SearchableTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait, HasFactory, Notifiable, SearchableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'name',
        'family',
        'avatar',
        'address',
        'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
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
            'users.name' => 10,
            'users.family' => 10,
            'users.email' => 9,
            'users.phone' => 9,
            'users.address' => 9,
        ],
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot() {
        parent::boot();
        static::creating(function ($model) {
            if ( ! $model->getKey()) {
                
                $model->{$model->getKeyName()} = (string) \Str::uuid();
            }
        });
    } 

    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing() {
        return false;
    }

    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType() {
        return 'string';
    }

    // Relations

    /**
     * Get the articles for the user.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function articles() {
        return $this->hasMany(Article::class);
    }

    /**
     * Get the starters for the user.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function starters() {
        return $this->hasMany(Starter::class);
    }

    /**
     * Get the tickets for the user.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function tickets() {
        return $this->hasMany(Ticket::class);
    }

    /**
     * Get the forms for the user.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function forms() {
        return $this->hasMany(Form::class);
    }

    /**
     * Get the forms for the user.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function orders() {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the about us for the user.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function about_us() {
        return $this->hasMany(AboutUs::class);
    }

    /**
     * Get the clearing for the user.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function clearings() {
        return $this->hasMany(Clearing::class);
    }

    /**
     * Get the lccation for the user.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function locations() {
        return $this->hasMany(location::class);
    }


}
